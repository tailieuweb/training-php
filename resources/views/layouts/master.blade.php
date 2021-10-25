<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Longkunz Furniture Store')</title>
    <link rel="icon" href="{{url('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{url('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{url('css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    @method('style')
</head>

<body>
    <!--::header part start::-->
    @include('partial.header')
    <!-- Header part end-->

    <!-- product_list start-->
    @yield('contents')
    <!-- product_list part end-->

    <!--::footer_part start::-->
    @include('partial.footer')
    <!--::footer_part end::-->

    @method('javascript')
</body>

</html>