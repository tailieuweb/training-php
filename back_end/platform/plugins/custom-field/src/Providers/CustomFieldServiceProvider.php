<?php

namespace Botble\CustomField\Providers;

use Botble\ACL\Repositories\Interfaces\RoleInterface;
use Botble\ACL\Repositories\Interfaces\UserInterface;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\CustomField\Support\CustomFieldSupport;
use Botble\Page\Models\Page;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\CustomField\Facades\CustomFieldSupportFacade;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Botble\Base\Supports\Helper;
use Botble\CustomField\Models\CustomField;
use Botble\CustomField\Models\FieldGroup;
use Botble\CustomField\Models\FieldItem;
use Botble\CustomField\Repositories\Caches\CustomFieldCacheDecorator;
use Botble\CustomField\Repositories\Eloquent\CustomFieldRepository;
use Botble\CustomField\Repositories\Caches\FieldGroupCacheDecorator;
use Botble\CustomField\Repositories\Eloquent\FieldGroupRepository;
use Botble\CustomField\Repositories\Caches\FieldItemCacheDecorator;
use Botble\CustomField\Repositories\Eloquent\FieldItemRepository;
use Botble\CustomField\Repositories\Interfaces\CustomFieldInterface;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CustomFieldServiceProvider extends ServiceProvider
{

    use LoadAndPublishDataTrait;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Helper::autoload(__DIR__ . '/../../helpers');

        $loader = AliasLoader::getInstance();
        $loader->alias('CustomField', CustomFieldSupportFacade::class);

        $this->app->bind(CustomFieldInterface::class, function () {
            return new CustomFieldCacheDecorator(
                new CustomFieldRepository(new CustomField),
                CUSTOM_FIELD_CACHE_GROUP
            );
        });

        $this->app->bind(FieldGroupInterface::class, function () {
            return new FieldGroupCacheDecorator(
                new FieldGroupRepository(new FieldGroup),
                CUSTOM_FIELD_CACHE_GROUP
            );
        });

        $this->app->bind(FieldItemInterface::class, function () {
            return new FieldItemCacheDecorator(
                new FieldItemRepository(new FieldItem),
                CUSTOM_FIELD_CACHE_GROUP
            );
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setNamespace('plugins/custom-field')
            ->loadAndPublishConfigurations(['permissions', 'general'])
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadMigrations()
            ->publishAssets();

        $this->app->register(EventServiceProvider::class);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-custom-field',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/custom-field::base.admin_menu.title',
                'icon'        => 'fas fa-cubes',
                'url'         => route('custom-fields.index'),
                'permissions' => ['custom-fields.index'],
            ]);

            $this->registerUsersFields();
            $this->registerPagesFields();

            if (is_plugin_active('blog')) {
                $this->registerBlogFields();
            }
        });

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }

    /**
     * @return CustomFieldSupport
     */
    protected function registerUsersFields()
    {
        return CustomFieldSupportFacade::registerRule('other', trans('plugins/custom-field::rules.logged_in_user'),
            'logged_in_user', function () {
                $users = $this->app->make(UserInterface::class)->all();
                $userArr = [];
                foreach ($users as $user) {
                    $userArr[$user->id] = $user->username . ' - ' . $user->email;
                }

                return $userArr;
            })
            ->registerRule('other', trans('plugins/custom-field::rules.logged_in_user_has_role'),
                'logged_in_user_has_role', function () {
                    $roles = $this->app->make(RoleInterface::class)->all();
                    $rolesArr = [];
                    foreach ($roles as $role) {
                        $rolesArr[$role->slug] = $role->name . ' - (' . $role->slug . ')';
                    }

                    return $rolesArr;
                });
    }

    /**
     * @return CustomFieldSupport|bool
     */
    protected function registerPagesFields()
    {
        if (!defined('PAGE_MODULE_SCREEN_NAME')) {
            return false;
        }

        return CustomFieldSupportFacade::registerRule('basic', trans('plugins/custom-field::rules.page_template'),
            'page_template', function () {
                return get_page_templates();
            })
            ->registerRule('basic', trans('plugins/custom-field::rules.page'), Page::class, function () {
                return $this->app->make(PageInterface::class)
                    ->advancedGet([
                        'select'   => [
                            'id',
                            'name',
                        ],
                        'order_by' => [
                            'created_at' => 'DESC',
                        ],
                    ])
                    ->pluck('name', 'id')
                    ->toArray();
            })
            ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                return [
                    Page::class => trans('plugins/custom-field::rules.model_name_page'),
                ];
            });
    }

    /**
     * @return bool|CustomFieldSupport
     */
    protected function registerBlogFields()
    {
        if (!defined('POST_MODULE_SCREEN_NAME')) {
            return false;
        }

        return CustomFieldSupportFacade::registerRuleGroup('blog')
            ->registerRule('blog', trans('plugins/custom-field::rules.category'), Category::class, function () {
                return $this->getBlogCategoryIds();
            })
            ->registerRule('blog', trans('plugins/custom-field::rules.post_with_related_category'),
                Post::class . '_post_with_related_category', function () {
                    return $this->getBlogCategoryIds();
                })
            ->registerRule('blog', trans('plugins/custom-field::rules.post_format'),
                Post::class . '_post_format', function () {
                    $formats = [];
                    foreach (get_post_formats() as $key => $format) {
                        $formats[$key] = $format['name'];
                    }
                    return $formats;
                })
            ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                return [
                    Post::class     => trans('plugins/custom-field::rules.model_name_post'),
                    Category::class => trans('plugins/custom-field::rules.model_name_category'),
                ];
            });
    }

    /**
     * @return array
     */
    protected function getBlogCategoryIds()
    {
        $categories = get_categories();

        $categoriesArr = [];
        foreach ($categories as $row) {
            $categoriesArr[$row->id] = $row->indent_text . ' ' . $row->name;
        }

        return $categoriesArr;
    }
}
