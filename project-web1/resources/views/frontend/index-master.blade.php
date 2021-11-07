<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Rental Hotel</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{url('frontend/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="{{url('frontend/css/media.css')}}">
      <link rel="stylesheet" href="{{url('frontend/css/search.css')}}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   </head>
   <!-- body -->
   <body class="main-layout">
      <?php $temp = 'tai-xuong-3png-1634191828.png';  ?>
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('')}}img/hotel/{{$temp}}" alt="#" /></div>
      </div>
      <!-- end loader -->

      @include('frontend.partial.header')
   
      @yield('content')

      @include('frontend.partial.footer')
        <!-- Javascript files-->
        <script src="{{url('frontend/js/translate.js')}}"></script>
      <script type="text/javascript"
      src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
      <script src="{{url('frontend/js/jquery.min.js')}}"></script>
      <script src="{{url('frontend/js/popper.min.js')}}"></script>
      <script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
      <script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{url('frontend/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{url('frontend/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{url('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{url('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{url('frontend/js/custom.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="{{url('frontend/js/search.js')}}"></script>
      </body>
</html>