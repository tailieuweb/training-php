<?php

namespace Botble\Member\Providers;

use Botble\Blog\Models\Post;
use EmailHandler;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Member\Http\Middleware\RedirectIfMember;
use Botble\Member\Http\Middleware\RedirectIfNotMember;
use Botble\Member\Models\Member;
use Botble\Member\Models\MemberActivityLog;
use Botble\Member\Repositories\Caches\MemberActivityLogCacheDecorator;
use Botble\Member\Repositories\Caches\MemberCacheDecorator;
use Botble\Member\Repositories\Eloquent\MemberActivityLogRepository;
use Botble\Member\Repositories\Eloquent\MemberRepository;
use Botble\Member\Repositories\Interfaces\MemberActivityLogInterface;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MemberServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        config([
            'auth.guards.member'     => [
                'driver'   => 'session',
                'provider' => 'members',
            ],
            'auth.providers.members' => [
                'driver' => 'eloquent',
                'model'  => Member::class,
            ],
            'auth.passwords.members' => [
                'provider' => 'members',
                'table'    => 'member_password_resets',
                'expire'   => 60,
            ],
            'auth.guards.member-api' => [
                'driver'   => 'passport',
                'provider' => 'members',
            ],
        ]);

        $router = $this->app->make('router');

        $router->aliasMiddleware('member', RedirectIfNotMember::class);
        $router->aliasMiddleware('member.guest', RedirectIfMember::class);

        $this->app->bind(MemberInterface::class, function () {
            return new MemberCacheDecorator(new MemberRepository(new Member));
        });

        $this->app->bind(MemberActivityLogInterface::class, function () {
            return new MemberActivityLogCacheDecorator(new MemberActivityLogRepository(new MemberActivityLog));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/member')
            ->loadAndPublishConfigurations(['general', 'permissions', 'assets', 'email'])
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web', 'api'])
            ->loadMigrations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-core-member',
                'priority'    => 22,
                'parent_id'   => null,
                'name'        => 'plugins/member::member.menu_name',
                'icon'        => 'fa fa-users',
                'url'         => route('member.index'),
                'permissions' => ['member.index'],
            ]);
        });

        $this->app->booted(function () {
            EmailHandler::addTemplateSettings(MEMBER_MODULE_SCREEN_NAME, config('plugins.member.email', []));
        });

        $this->app->register(EventServiceProvider::class);

        add_filter(IS_IN_ADMIN_FILTER, [$this, 'setInAdmin'], 24);

        add_action(BASE_ACTION_INIT, function () {
            if (defined('GALLERY_MODULE_SCREEN_NAME') && request()->segment(1) == 'account') {
                \Gallery::removeModule(Post::class);
            }
        }, 12, 2);

        add_filter(BASE_FILTER_AFTER_SETTING_CONTENT, [$this, 'addSettings'], 49);
    }

    /**
     * @return bool
     */
    public function setInAdmin($isInAdmin): bool
    {
        return request()->segment(1) === 'account' || $isInAdmin;
    }

    /**
     * @param null|string $data
     * @return string
     */
    public function addSettings($data = null)
    {
        return $data . view('plugins/member::settings')->render();
    }
}
