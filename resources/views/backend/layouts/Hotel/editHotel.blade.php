<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sửa sản phẩm | Pos Coron! </title>

    <!-- Bootstrap -->
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">

</body>
@include('backend.partial.header')
        <!-- page content -->
        <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Cập nhập Hotel</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Cập nhập sản phẩm  <small>sub title</small></h2>
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
                                @foreach($edit_hotel as $hotel)
                                    <form class="" action="{{URL::to('/hotels/updatehotel/'.$hotel->hotel_id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                        </p>
                                        <span class="section">Thông tin Hotel</span>
                                      
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="{{$hotel->name}}" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Giày ...." required="required" />
                                            </div>
                                        </div>
                                   
                                        
                                       
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Type name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select class="form-control" name="type" id="cate">
                                                @foreach($type as $type)
                                            <option value="{{$type->categories_id}}">{{$type->categories_name}}</option>
                                           @endforeach
                                            </select> *
                                        </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Location<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                            <select class="form-control" name="location" id="cate">
                                                @foreach($location as $location)
                                            <option value="{{$location->location_id}}">{{$location->address}}</option>
                                           @endforeach
                                            </select> *
                                        </div>
                                        </div>
                                        <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">person<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$hotel->person}}" data-validate-length-range="6" data-validate-words="2" name="person" placeholder="...." required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$hotel->room}}" data-validate-length-range="6" data-validate-words="2" name="room" placeholder="...." required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Service<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$hotel->services}}" data-validate-length-range="6" data-validate-words="2" name="service" placeholder="...." required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Hotel infomation<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$hotel->hotel_info}}" data-validate-length-range="6" data-validate-words="2" name="hotel_info" placeholder="...." required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Money in day<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" value="{{$hotel->money_day}}" data-validate-length-range="6" data-validate-words="2" name="money_day" placeholder="...." required="required" />
                                    </div>
                                </div>
                                        
                                        
                                        
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Image product<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="file" name="product_image"   />
                                                <img src="/public/img/hotel/{{$hotel->image}}" height="100" width="100" alt="">
                                            </div>
                                            
                                         
                                               
                                           
                                           
                                        </div>
                                      
                                       
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit'name = "update_product" class="btn btn-primary">Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

         @include('backend.partial.footer')
          <!-- Javascript functions	-->
</html>