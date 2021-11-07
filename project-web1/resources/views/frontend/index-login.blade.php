<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{url('frontend/css/style1.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{url('frontend/css/register.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}" type="text/css" media="all">
   
    
   
</head>

    <!-- <meta name="robots" content="noindex"> -->

    <body> 
        </div>
        <section class="main">
        @include('frontend.partial.header-login')
        @yield('content')
        @include('frontend.partial.footer-login')

        </section>
    </body>

</html>