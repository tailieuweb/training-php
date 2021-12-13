<?php

namespace Botble\Block\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Block\Models\Block;
use Illuminate\Support\Facades\Event;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\ServiceProvider;
use Botble\Block\Repositories\Caches\BlockCacheDecorator;
use Botble\Block\Repositories\Eloquent\BlockRepository;
use Botble\Block\Repositories\Interfaces\BlockInterface;
use Botble\Base\Supports\Helper;
use Language;

class BlockServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(BlockInterface::class, function () {
            return new BlockCacheDecorator(new BlockRepository(new Block));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/block')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadMigrations();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-block',
                'priority'    => 6,
                'parent_id'   => null,
                'name'        => 'plugins/block::block.menu',
                'icon'        => 'fa fa-code',
                'url'         => route('block.index'),
                'permissions' => ['block.index'],
            ]);
        });

        $this->app->booted(function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                Language::registerModule([Block::class]);
            }

            if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
                \CustomField::registerModule(Block::class)
                    ->registerRule('basic', trans('plugins/block::block.name'), Block::class, function () {
                        return $this->app->make(BlockInterface::class)->pluck('name', 'id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                            Block::class => trans('plugins/block::block.name'),
                        ];
                    });
            }

            $this->app->register(HookServiceProvider::class);
        });
    }
}
