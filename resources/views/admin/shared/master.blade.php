<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.html') }}">

    <title>Manager</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{ asset('admin/css/owl.carousel.css') }}" type="text/css">

      <!--right slidebar-->
      <link href="{{ asset('admin/css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  @if(session('msg'))
	    <div class="alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-1" style="position: absolute;top:50px;right: 0;z-index: 100">{{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
		</div>
  @elseif(count($errors) > 0)
  <div class="alert alert-danger alert-dismissible text-center mt-1" style="position: absolute;top:50px;right: 0;z-index: 100">
    @foreach($errors->all() as $err)
      @if(count($errors) == 1)
      {{ $err }}
      @else 
      {{ $err }}</br>
      @endif
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <section id="container">
  @yield('content')
  </section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('admin/js/jquery.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ asset('admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('admin/js/owl.carousel.js') }}" ></script>
<script src="{{ asset('admin/js/jquery.customSelect.min.js') }}" ></script>
<script src="{{ asset('admin/js/respond.min.js') }}" ></script>

<!--right slidebar-->
<script src="{{ asset('admin/js/slidebars.min.js') }}"></script>

<!--common script for all pages-->
<script src="{{ asset('admin/js/common-scripts.js') }}"></script>

<!--script for this page-->
<script src="{{ asset('admin/js/sparkline-chart.js') }}"></script>
<script src="{{ asset('admin/js/easy-pie-chart.js') }}"></script>
<script src="{{ asset('admin/js/count.js') }}"></script>

<script>

  //owl carousel

  $(document).ready(function() {
      $("#owl-demo").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true,
          autoPlay:true

      });
  });

  //custom select box
  $(function(){
      $('select.styled').customSelect();
  });
  // change role for user
  $('.role-admin').change(function(){
    let admin_id = $(this).data('id');
    let role = $(this).val();
    changeRole(admin_id,role);   
  });
  function changeRole(admin_id,role) {
    let url = "{{ route('changeRole') }}";
    $.ajax({
      url: url,
      data: {admin_id: admin_id, role: role},
      type: 'GET',
      success: function(response) {
        alert(response.msg);
      },
      error: function(response) {
        
      }
    })
  }
  // change status order for admin
  $('.status-update').change(function(){
    let order_id = $(this).data('order-id');
    let status = $(this).val();
    console.log(order_id);
    changeStatus(order_id,status);   
  });
  function changeStatus(order_id,status) {
    let url = "{{ route('changeStatus') }}";
    $.ajax({
      url: url,
      data: {order_id: order_id, status: status},
      type: 'GET',
      success: function(response) {
        alert(response.msg);
      },
      error: function(response) {
        alert("Failed action");
      }
    })
  }
  // change type for customer
  $('.type-customer').change(function(){
    let customer_id = $(this).data('id');
    let type = $(this).val();
    changeType(customer_id,type);   
  });
  function changeType(customer_id,type) {
    let url = "{{ route('changeType') }}";
    $.ajax({
      url: url,
      data: {customer_id: customer_id, type: type},
      type: 'GET',
      success: function(response) {
        alert(response.msg);
      },
      error: function(response) {
        
      }
    })
  }

</script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
