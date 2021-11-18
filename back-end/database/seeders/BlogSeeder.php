<?php

namespace Database\Seeders;

use Botble\ACL\Models\User;
use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Blog\Models\Tag;
use Botble\Language\Models\LanguageMeta;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Html;
use Illuminate\Support\Str;
use RvMedia;
use SlugHelper;

class BlogSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('news');

        Post::truncate();
        Category::truncate();
        Tag::truncate();
        Slug::where('reference_type', Post::class)->delete();
        Slug::where('reference_type', Tag::class)->delete();
        Slug::where('reference_type', Category::class)->delete();
        MetaBoxModel::where('reference_type', Post::class)->delete();
        MetaBoxModel::where('reference_type', Tag::class)->delete();
        MetaBoxModel::where('reference_type', Category::class)->delete();
        LanguageMeta::where('reference_type', Post::class)->delete();
        LanguageMeta::where('reference_type', Tag::class)->delete();
        LanguageMeta::where('reference_type', Category::class)->delete();

        $faker = Factory::create();

        $data = [
            'en_US' => [
                [
                    'name'       => 'Design',
                    'is_default' => true,
                ],
                [
                    'name' => 'Lifestyle',
                ],
                [
                    'name'      => 'Travel Tips',
                    'parent_id' => 2,
                ],
                [
                    'name' => 'Healthy',
                ],
                [
                    'name'      => 'Travel Tips',
                    'parent_id' => 4,
                ],
                [
                    'name' => 'Hotel',
                ],
                [
                    'name'      => 'Nature',
                    'parent_id' => 6,
                ],
            ],
            'vi'    => [
                [
                    'name'       => 'Phong cách sống',
                    'is_default' => true,
                ],
                [
                    'name' => 'Sức khỏe',
                ],
                [
                    'name'      => 'Món ngon',
                    'parent_id' => 9,
                ],
                [
                    'name' => 'Sức khỏe',
                ],
                [
                    'name'      => 'Mẹo du lịch',
                    'parent_id' => 11,
                ],
                [
                    'name' => 'Khách sạn',
                ],
                [
                    'name'      => 'Thiên nhiên',
                    'parent_id' => 13,
                ],
            ],
        ];

        foreach ($data as $locale => $categories) {
            foreach ($categories as $index => $item) {
                $item['description'] = $faker->text();
                $item['author_id'] = 1;
                $item['author_type'] = User::class;
                $item['is_featured'] = !isset($item['parent_id']) && $index != 0;

                $category = Category::create($item);

                Slug::create([
                    'reference_type' => Category::class,
                    'reference_id'   => $category->id,
                    'key'            => Str::slug($category->name),
                    'prefix'         => SlugHelper::getPrefix(Category::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Category::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($category, $locale, $originValue);
            }
        }

        $data = [
            'en_US' => [
                [
                    'name' => 'General',
                ],
                [
                    'name' => 'Design',
                ],
                [
                    'name' => 'Fashion',
                ],
                [
                    'name' => 'Branding',
                ],
                [
                    'name' => 'Modern',
                ],
            ],
            'vi'    => [
                [
                    'name' => 'Chung',
                ],
                [
                    'name' => 'Thiết kế',
                ],
                [
                    'name' => 'Thời trang',
                ],
                [
                    'name' => 'Thương hiệu',
                ],
                [
                    'name' => 'Hiện đại',
                ],
            ],
        ];

        foreach ($data as $locale => $tags) {
            foreach ($tags as $index => $item) {
                $item['author_id'] = 1;
                $item['author_type'] = User::class;
                $tag = Tag::create($item);

                Slug::create([
                    'reference_type' => Tag::class,
                    'reference_id'   => $tag->id,
                    'key'            => Str::slug($tag->name),
                    'prefix'         => SlugHelper::getPrefix(Tag::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Tag::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($tag, $locale, $originValue);
            }
        }

        $data = [
            'en_US' => [
                [
                    'name' => 'The Top 2020 Handbag Trends to Know',
                ],
                [
                    'name' => 'Top Search Engine Optimization Strategies!',
                ],
                [
                    'name' => 'Which Company Would You Choose?',
                ],
                [
                    'name' => 'Used Car Dealer Sales Tricks Exposed',
                ],
                [
                    'name' => '20 Ways To Sell Your Product Faster',
                ],
                [
                    'name' => 'The Secrets Of Rich And Famous Writers',
                ],
                [
                    'name' => 'Imagine Losing 20 Pounds In 14 Days!',
                ],
                [
                    'name' => 'Are You Still Using That Slow, Old Typewriter?',
                ],
                [
                    'name' => 'A Skin Cream That’s Proven To Work',
                ],
                [
                    'name' => '10 Reasons To Start Your Own, Profitable Website!',
                ],
                [
                    'name' => 'Simple Ways To Reduce Your Unwanted Wrinkles!',
                ],
                [
                    'name' => 'Apple iMac with Retina 5K display review',
                ],
                [
                    'name' => '10,000 Web Site Visitors In One Month:Guaranteed',
                ],
                [
                    'name' => 'Unlock The Secrets Of Selling High Ticket Items',
                ],
                [
                    'name' => '4 Expert Tips On How To Choose The Right Men’s Wallet',
                ],
                [
                    'name' => 'Sexy Clutches: How to Buy & Wear a Designer Clutch Bag',
                ],
            ],
            'vi'    => [
                [
                    'name' => 'Xu hướng túi xách hàng đầu năm 2020 cần biết',
                ],
                [
                    'name' => 'Các Chiến lược Tối ưu hóa Công cụ Tìm kiếm Hàng đầu!',
                ],
                [
                    'name' => 'Bạn sẽ chọn công ty nào?',
                ],
                [
                    'name' => 'Lộ ra các thủ đoạn bán hàng của đại lý ô tô đã qua sử dụng',
                ],
                [
                    'name' => '20 Cách Bán Sản phẩm Nhanh hơn',
                ],
                [
                    'name' => 'Bí mật của những nhà văn giàu có và nổi tiếng',
                ],
                [
                    'name' => 'Hãy tưởng tượng bạn giảm 20 bảng Anh trong 14 ngày!',
                ],
                [
                    'name' => 'Bạn vẫn đang sử dụng máy đánh chữ cũ, chậm đó?',
                ],
                [
                    'name' => 'Một loại kem dưỡng da đã được chứng minh hiệu quả',
                ],
                [
                    'name' => '10 Lý do Để Bắt đầu Trang web Có Lợi nhuận của Riêng Bạn!',
                ],
                [
                    'name' => 'Những cách đơn giản để giảm nếp nhăn không mong muốn của bạn!',
                ],
                [
                    'name' => 'Đánh giá Apple iMac với màn hình Retina 5K',
                ],
                [
                    'name' => '10.000 Khách truy cập Trang Web Trong Một Tháng: Được Đảm bảo',
                ],
                [
                    'name' => 'Mở khóa Bí mật Bán được vé Cao',
                ],
                [
                    'name' => '4 Lời khuyên của Chuyên gia về Cách Chọn Ví Nam Phù hợp',
                ],
                [
                    'name' => 'Sexy Clutches: Cách Mua & Đeo Túi Clutch Thiết kế',
                ],
            ],
        ];

        foreach ($data as $locale => $posts) {

            foreach ($posts as $index => $item) {
                $item['content'] =
                    ($index % 3 == 0 ? Html::tag('p',
                        '[youtube-video]https://www.youtube.com/watch?v=SlPhMPnQ58k[/youtube-video]') : '') .
                    Html::tag('p', $faker->realText(1000)) .
                    Html::tag('p',
                        Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(1, 5) . '.jpg', 'medium'))
                            ->toHtml(), ['class' => 'text-center']) .
                    Html::tag('p', $faker->realText(500)) .
                    Html::tag('p',
                        Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(6, 10) . '.jpg', 'medium'))
                            ->toHtml(), ['class' => 'text-center']) .
                    Html::tag('p', $faker->realText(1000)) .
                    Html::tag('p',
                        Html::image(RvMedia::getImageUrl('news/' . $faker->numberBetween(11, 14) . '.jpg', 'medium'))
                            ->toHtml(), ['class' => 'text-center']) .
                    Html::tag('p', $faker->realText(1000));
                $item['author_id'] = 1;
                $item['author_type'] = User::class;
                $item['views'] = $faker->numberBetween(100, 2500);
                $item['is_featured'] = $index < 6;
                $item['image'] = 'news/' . ($index + 1) . '.jpg';
                $item['description'] = $faker->text();
                $item['format_type'] = $index % 3 == 0 ? 'video' : 'default';

                $post = Post::create($item);

                $post->categories()->sync($locale == 'en_US' ? [
                    $faker->numberBetween(1, 4),
                    $faker->numberBetween(5, 7),
                ] : [$faker->numberBetween(8, 11), $faker->numberBetween(12, 14)]);

                $post->tags()->sync($locale == 'en_US' ? [1, 2, 3, 4, 5] : [6, 7, 8, 9, 10]);

                Slug::create([
                    'reference_type' => Post::class,
                    'reference_id'   => $post->id,
                    'key'            => Str::slug($post->name),
                    'prefix'         => SlugHelper::getPrefix(Post::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Post::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($post, $locale, $originValue);
            }
        }
    }
}
