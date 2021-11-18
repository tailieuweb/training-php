<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Menu;

class MenuSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en_US' => [
                [
                    'name'     => 'Main menu',
                    'slug'     => 'main-menu',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title' => 'Home',
                            'url'   => '/',
                        ],
                        [
                            'title'  => 'Purchase',
                            'url'    => 'https://botble.com/go/download-cms',
                            'target' => '_blank',
                        ],
                        [
                            'title'          => 'Blog',
                            'reference_id'   => 2,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Galleries',
                            'url'   => '/galleries',
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 3,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Favorite websites',
                    'slug'  => 'favorite-websites',
                    'items' => [
                        [
                            'title' => 'Speckyboy Magazine',
                            'url'   => 'http://speckyboy.com',
                        ],
                        [
                            'title' => 'Tympanus-Codrops',
                            'url'   => 'http://tympanus.com',
                        ],
                        [
                            'title' => 'Kipalog Blog',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'SitePoint',
                            'url'   => 'http://www.sitepoint.com',
                        ],
                        [
                            'title' => 'CreativeBloq',
                            'url'   => 'http://www.creativebloq.com',
                        ],
                        [
                            'title' => 'Techtalk',
                            'url'   => 'http://techtalk.vn',
                        ],
                    ],
                ],

                [
                    'name'  => 'My links',
                    'slug'  => 'my-links',
                    'items' => [
                        [
                            'title' => 'Homepage',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Contact',
                            'reference_id'   => 3,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Hotel',
                            'reference_id'   => 6,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Travel Tips',
                            'reference_id'   => 3,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title' => 'Galleries',
                            'url'   => '/galleries',
                        ],
                    ],
                ],

                [
                    'name'  => 'Featured Categories',
                    'slug'  => 'featured-categories',
                    'items' => [
                        [
                            'title'          => 'Lifestyle',
                            'reference_id'   => 2,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Travel Tips',
                            'reference_id'   => 3,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Healthy',
                            'reference_id'   => 4,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Hotel',
                            'reference_id'   => 6,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Nature',
                            'reference_id'   => 7,
                            'reference_type' => Category::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Social',
                    'slug'  => 'social',
                    'items' => [
                        [
                            'title'     => 'Facebook',
                            'url'       => 'https://facebook.com',
                            'icon_font' => 'fa fa-facebook',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Twitter',
                            'url'       => 'https://twitter.com',
                            'icon_font' => 'fa fa-twitter',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Github',
                            'url'       => 'https://github.com',
                            'icon_font' => 'fa fa-github',
                            'target'    => '_blank',
                        ],

                        [
                            'title'     => 'Linkedin',
                            'url'       => 'https://linkedin.com',
                            'icon_font' => 'fa fa-linkedin',
                            'target'    => '_blank',
                        ],
                    ],
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Menu chính',
                    'slug'     => 'menu-chinh',
                    'location' => 'main-menu',
                    'items'    => [
                        [
                            'title' => 'Trang chủ',
                            'url'   => '/',
                        ],
                        [
                            'title'  => 'Mua ngay',
                            'url'    => 'https://botble.com/go/download-cms',
                            'target' => '_blank',
                        ],
                        [
                            'title'          => 'Tin tức',
                            'reference_id'   => 5,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Thư viện ảnh',
                            'url'   => '/galleries',
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Trang web yêu thích',
                    'slug'  => 'trang-web-yeu-thich',
                    'items' => [
                        [
                            'title' => 'Speckyboy Magazine',
                            'url'   => 'http://speckyboy.com',
                        ],
                        [
                            'title' => 'Tympanus-Codrops',
                            'url'   => 'http://tympanus.com',
                        ],
                        [
                            'title' => 'Kipalog Blog',
                            'url'   => '#',
                        ],
                        [
                            'title' => 'SitePoint',
                            'url'   => 'http://www.sitepoint.com',
                        ],
                        [
                            'title' => 'CreativeBloq',
                            'url'   => 'http://www.creativebloq.com',
                        ],
                        [
                            'title' => 'Techtalk',
                            'url'   => 'http://techtalk.vn',
                        ],
                    ],
                ],

                [
                    'name'  => 'Liên kết',
                    'slug'  => 'lien-ket',
                    'items' => [
                        [
                            'title' => 'Trang chủ',
                            'url'   => '/',
                        ],
                        [
                            'title'          => 'Liên hệ',
                            'reference_id'   => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title'          => 'Khách sạn',
                            'reference_id'   => 13,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Món ngon',
                            'reference_id'   => 10,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title' => 'Thư viện ảnh',
                            'url'   => '/galleries',
                        ],
                    ],
                ],

                [
                    'name'  => 'Danh mục nổi bật',
                    'slug'  => 'danh-muc-noi-bat',
                    'items' => [
                        [
                            'title'          => 'Sức khỏe',
                            'reference_id'   => 9,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Món ngon',
                            'reference_id'   => 10,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Sức khỏe',
                            'reference_id'   => 11,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Khách sạn',
                            'reference_id'   => 13,
                            'reference_type' => Category::class,
                        ],
                        [
                            'title'          => 'Thiên nhiên',
                            'reference_id'   => 14,
                            'reference_type' => Category::class,
                        ],
                    ],
                ],

                [
                    'name'  => 'Mạng xã hội',
                    'slug'  => 'mang-xa-hoi',
                    'items' => [
                        [
                            'title'     => 'Facebook',
                            'url'       => 'https://facebook.com',
                            'icon_font' => 'fa fa-facebook',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Twitter',
                            'url'       => 'https://twitter.com',
                            'icon_font' => 'fa fa-twitter',
                            'target'    => '_blank',
                        ],
                        [
                            'title'     => 'Github',
                            'url'       => 'https://github.com',
                            'icon_font' => 'fa fa-github',
                            'target'    => '_blank',
                        ],

                        [
                            'title'     => 'Linkedin',
                            'url'       => 'https://linkedin.com',
                            'icon_font' => 'fa fa-linkedin',
                            'target'    => '_blank',
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::create([
                        'menu_id'  => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = LanguageMeta::where([
                        'reference_id'   => $locale == 'en_US' ? 1 : 2,
                        'reference_type' => MenuLocation::class,
                    ])->value('lang_meta_origin');

                    LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
                }

                foreach ($item['items'] as $menuNode) {
                    $this->createMenuNode($index, $menuNode, $locale, $menu->id);
                }

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($menu, $locale, $originValue);
            }
        }

        Menu::clearCacheMenuItems();
    }

    /**
     * @param int $index
     * @param array $menuNode
     * @param string $locale
     * @param int $menuId
     * @param int $parentId
     */
    protected function createMenuNode(int $index, array $menuNode, string $locale, int $menuId, int $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
