<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <title>{{ __('Maintenance mode') }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/core/core/base/css/error-pages.css') }}">
</head>
<body>
<div class="container">
    <h1>{{ __('Maintenance mode') }}</h1>
    <p>{{ __('Sorry, we are doing some maintenance. Please check back soon.') }}</p>
    @if (setting('admin_email'))
        <p>{!! clean(__('If you need help, contact us at :mail.', ['mail' => Html::link('mailto:' . setting('admin_email'), setting('admin_email'))])) !!}</p>
    @endif
</div>
</body>
</html>

