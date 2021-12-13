<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Models\Widget as WidgetModel;
use Theme;

class WidgetSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetModel::truncate();

        $data = [
            'en_US' => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Recent Posts',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Categories',
                        'menu_id' => 'featured-categories',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Social',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Favorite Websites',
                        'menu_id' => 'favorite-websites',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'My Links',
                        'menu_id' => 'my-links',
                    ],
                ],
            ],
            'vi'    => [
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Bài viết gần đây',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'RecentPostsWidget',
                    'sidebar_id' => 'top_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'RecentPostsWidget',
                        'name'           => 'Bài viết gần đây',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'TagsWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 0,
                    'data'       => [
                        'id'             => 'TagsWidget',
                        'name'           => 'Tags',
                        'number_display' => 5,
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Danh mục nổi bật',
                        'menu_id' => 'danh-muc-noi-bat',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'primary_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Mạng xã hội',
                        'menu_id' => 'social',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 1,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Trang web yêu thích',
                        'menu_id' => 'trang-web-yeu-thich',
                    ],
                ],
                [
                    'widget_id'  => 'CustomMenuWidget',
                    'sidebar_id' => 'footer_sidebar',
                    'position'   => 2,
                    'data'       => [
                        'id'      => 'CustomMenuWidget',
                        'name'    => 'Liên kết',
                        'menu_id' => 'lien-ket',
                    ],
                ],
            ],
        ];

        $theme = Theme::getThemeName();

        foreach ($data as $locale => $widgets) {
            foreach ($widgets as $item) {
                $item['theme'] = $locale == 'en_US' ? $theme : ($theme . '-' . $locale);
                WidgetModel::create($item);
            }
        }
    }
}
