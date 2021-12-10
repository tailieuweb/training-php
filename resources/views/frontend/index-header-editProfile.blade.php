<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Update Profile</title>
    <!-- Profile User css -->
    <link rel="stylesheet" href="{{url('frontend/css/profile_edit.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/ijaboCropTool.min.css')}}">
    <link href="https://unpkg.com/bootstrap@4.0.0/dist/css/bootstrap.css" rel="stylesheet" />
    <link href="https://unpkg.com/font-awesome@4.7.0/css/font-awesome.min.css" rel="stylesheet" />
   
</head>
<!-- body -->
<body>
    <!-- end loader -->
    @yield('content')
    <!-- Javascript files-->
    <!-- nên đặt tham chiếu query trước -->
    <script src="{{url('frontend/js/jquery-3.6.0.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script> -->
    <script src="{{url('frontend/js/profile.js')}}"></script>
    <script src="{{url('frontend/js/translate.js')}}"></script>  
    <script src="{{url('frontend/js/ijaboCropTool.min.js' )}}"></script>
    <!-- <script src="https://unpkg.com/popper.js@1.12.9/dist/umd/popper.js"></script> -->
    <script src="https://unpkg.com/bootstrap@4.0.0/dist/js/bootstrap.js"></script>
    <!-- https://www.youtube.com/watch?v=_NTSL8EQACo -->
    <!-- snip avata profile -->
    <script>
        $(document).on('click', '#change_picture_btn',function(){
            $('#user_image').click();
        });
        //ap dung ajax dùng để crop ảnh avatar
    $('#user_image').ijaboCropTool({
          preview : '.user_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
            // đường dẫn chỉ vào để lấy ra giá trị của user_id
          processUrl: '{{ route("updateImage") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status ,error){
            alert(message);
            alert(element);
          }
       });
    </script>
</body>
<!-- processUrl:'{{ url('/updateProfile')}}', -->
<!-- processUrl:'{{url('')}}/updateProfile/{{$users_web->id}}', -->
</html>