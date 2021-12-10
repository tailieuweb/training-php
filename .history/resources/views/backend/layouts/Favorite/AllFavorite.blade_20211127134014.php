<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Categories | Pos Coron!</title>

  <!-- Bootstrap -->
  <link href="{{ url('cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}">
  <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ url('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- Datatables -->

  <link href="{{ url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->

  <link href="{{ url('build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">

  @include('backend.partial.header')

  @if (session()->has('message'))
  <div class="alert alert-success">
    {{ session()->get('message') }}
  </div>
  @endif
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Quản lí Categories <small> </small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Danh sách Categories </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>User</th>
                          <th>Hotel</th>
                          <th>Date</th>
                          <th style="width:50px;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $stt = 1;
                        $id_new = 0;
                        ?>
                        @foreach($favorite as $favorite )
                        <?php $key = rand(111111111, 999999999);
                        ?>
                        <tr>
                          <td>{{$favorite->hotel_id}}</td>
                          <td>{{$favorite->username}}</td>
                          <td>{{$favorite->name}}</td>
                          <td>{{$favorite->date_created}}</td>
                          <td>
                            <!-- <div class="fa-hover col-md-3 col-sm-4  "><a href="{{URL::to('/favorite/edit/'.$key.$favorite->id)}}"><i class="fa fa-wrench"></i></a> -->

                            <div class="fa-hover col-md-3 col-sm-4  "><a onclick="setValueDelete(<?php echo $favorite->favorite_id; ?>)"><i class="fa fa-trash"></i></a>
                            </div>

                          </td>
                        </tr>
                        <?php
                        $stt++;
                        ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
  </div>

  </div>
  </div>
  </div>

  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- /page content -->

  @include('backend.partial.footer')
  <script>
    function setValueDelete(id) {
      let r = confirm("Bạn có chắc muốn tiếp tục xóa?");
      if (r == true) {
        window.location = '{{asset('')}}admin/favorite/delete/<?php echo $key; ?>' + id
      } else {
        window.location = "{{asset('')}}admin/favorite/"
      }
      document.getElementById("demo").innerHTML = txt;
    }
  </script>

</body>

</html>