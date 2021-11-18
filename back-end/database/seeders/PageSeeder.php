<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Page\Models\Page;
use Botble\Slug\Models\Slug;
use Html;
use Illuminate\Support\Str;
use SlugHelper;

class PageSeeder extends BaseSeeder
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
                    'name'     => 'Homepage',
                    'content'  =>
                        Html::tag('div', '[featured-posts][/featured-posts]') .
                        Html::tag('div', '[recent-posts title="What\'s new?"][/recent-posts]') .
                        Html::tag('div', '[featured-categories-posts title="Best for you"][/featured-categories-posts]') .
                        Html::tag('div', '[all-galleries limit="8"][/all-galleries]')
                    ,
                    'template' => 'no-sidebar',
                ],
                [
                    'name'     => 'Blog',
                    'content'  => '---',
                    'template' => 'default',
                ],
                [
                    'name'     => 'Contact',
                    'content'  => Html::tag('p',
                            'Address: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', 'Hotline: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', 'For the fastest reply, please use the contact form below.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p',
                            'To use this website we are using Cookies and collecting some Data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.') .
                        Html::tag('h4', 'Essential Data') .
                        Html::tag('p',
                            'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.') .
                        Html::tag('p',
                            '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.') .
                        Html::tag('p',
                            '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'),
                    'template' => 'default',
                ],
            ],
            'vi'    => [
                [
                    'name'     => 'Trang chủ',
                    'content'  =>
                        Html::tag('div', '[featured-posts][/featured-posts]') .
                        Html::tag('div', '[recent-posts title="Có gì mới?"][/recent-posts]') .
                        Html::tag('div', '[featured-categories-posts title="Tốt nhất cho bạn"][/featured-categories-posts]') .
                        Html::tag('div', '[all-galleries limit="8"][/all-galleries]')
                    ,
                    'template' => 'no-sidebar',
                ],
                [
                    'name'     => 'Tin tức',
                    'content'  => '---',
                    'template' => 'default',
                ],
                [
                    'name'     => 'Liên hệ',
                    'content'  => Html::tag('p',
                            'Địa chỉ: North Link Building, 10 Admiralty Street, 757695 Singapore') .
                        Html::tag('p', 'Đường dây nóng: 18006268') .
                        Html::tag('p', 'Email: contact@botble.com') .
                        Html::tag('p',
                            '[google-map]North Link Building, 10 Admiralty Street, 757695 Singapore[/google-map]') .
                        Html::tag('p', 'Để được trả lời nhanh nhất, vui lòng sử dụng biểu mẫu liên hệ bên dưới.') .
                        Html::tag('p', '[contact-form][/contact-form]'),
                    'template' => 'default',
                ],
                [
                    'name'     => 'Cookie Policy',
                    'content'  => Html::tag('h3', 'EU Cookie Consent') .
                        Html::tag('p',
                            'Để sử dụng trang web này, chúng tôi đang sử dụng Cookie và thu thập một số Dữ liệu. Để tuân thủ GDPR của Liên minh Châu Âu, chúng tôi cho bạn lựa chọn nếu bạn cho phép chúng tôi sử dụng một số Cookie nhất định và thu thập một số Dữ liệu.') .
                        Html::tag('h4', 'Dữ liệu cần thiết') .
                        Html::tag('p',
                            'Dữ liệu cần thiết là cần thiết để chạy Trang web bạn đang truy cập về mặt kỹ thuật. Bạn không thể hủy kích hoạt chúng.') .
                        Html::tag('p',
                            '- Session Cookie: PHP sử dụng Cookie để xác định phiên của người dùng. Nếu không có Cookie này, trang web sẽ không hoạt động.') .
                        Html::tag('p',
                            '- XSRF-Token Cookie: Laravel tự động tạo "token" CSRF cho mỗi phiên người dùng đang hoạt động do ứng dụng quản lý. Token này được sử dụng để xác minh rằng người dùng đã xác thực là người thực sự đưa ra yêu cầu đối với ứng dụng.'),
                    'template' => 'default',
                ],
            ],
        ];

        Page::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($data as $locale => $pages) {
            foreach ($pages as $index => $item) {
                $item['user_id'] = 1;
                $page = Page::create($item);

                Slug::create([
                    'reference_type' => Page::class,
                    'reference_id'   => $page->id,
                    'key'            => Str::slug($page->name),
                    'prefix'         => SlugHelper::getPrefix(Page::class),
                ]);

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id'   => $index + 1,
                        'reference_type' => Page::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($page, $locale, $originValue);
            }
        }
    }
}
