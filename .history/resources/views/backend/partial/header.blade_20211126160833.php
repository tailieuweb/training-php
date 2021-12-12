<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{asset('hotels')}}" class="site_title"><i class="fa fa-paw"></i> <span>Pos Coron!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div> -->
              <div class="profile_info">
                <span>Welcome admin</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{asset('hotels')}}">Dashboard</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Quản lí Hotel <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{asset('hotels')}}">Danh sách Hotel</a></li>
                      <li><a href="{{url('hotels/addhotel')}}">Thêm Hotel</a></li>
                      <!-- <li><a href="{{asset('allmanufactures')}}">Xem tất cả nhà sản xuất</a></li>
                      <li><a href="{{url('admin/addmanufactures')}}">Thêm hiệu sản xuất</a></li>
                      <li><a href="{{asset('allprotypes')}}">Xem tất cả loại hàng</a></li>
                      <li><a href="{{url('admin/addprotypes')}}">Thêm loại hàng</a></li>
                      <li><a href="{{asset('allusers')}}">Quản lí người dùng</a></li> -->


                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{asset('categories')}}">Danh sách Categories</a></li>
                      <li><a href="{{url('categories/add')}}">Thêm Categories</a></li>
                      <!-- <li><a href="{{asset('allmanufactures')}}">Xem tất cả nhà sản xuất</a></li>
                      <li><a href="{{url('admin/addmanufactures')}}">Thêm hiệu sản xuất</a></li>
                      <li><a href="{{asset('allprotypes')}}">Xem tất cả loại hàng</a></li>
                      <li><a href="{{url('admin/addprotypes')}}">Thêm loại hàng</a></li>
                      <li><a href="{{asset('allusers')}}">Quản lí người dùng</a></li> -->


                    </ul>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Favorite <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{asset('favorite')}}">Danh sách Favorite</a></li>
                      
                      <!-- <li><a href="{{asset('allmanufactures')}}">Xem tất cả nhà sản xuất</a></li>
                      <li><a href="{{url('admin/addmanufactures')}}">Thêm hiệu sản xuất</a></li>
                      <li><a href="{{asset('allprotypes')}}">Xem tất cả loại hàng</a></li>
                      <li><a href="{{url('admin/addprotypes')}}">Thêm loại hàng</a></li>
                      <li><a href="{{asset('allusers')}}">Quản lí người dùng</a></li> -->


                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Rating <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{asset('rating')}}">Danh sách Rating</a></li>
                    
                      <!-- <li><a href="{{asset('allmanufactures')}}">Xem tất cả nhà sản xuất</a></li>
                      <li><a href="{{url('admin/addmanufactures')}}">Thêm hiệu sản xuất</a></li>
                      <li><a href="{{asset('allprotypes')}}">Xem tất cả loại hàng</a></li>
                      <li><a href="{{url('admin/addprotypes')}}">Thêm loại hàng</a></li>
                      <li><a href="{{asset('allusers')}}">Quản lí người dùng</a></li> -->


                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Location <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="{{asset('location')}}">Danh sách Location</a></li>
                    <li><a href="{{url('location/add')}}">Thêm Location</a></li>
                      <!-- <li><a href="{{asset('allmanufactures')}}">Xem tất cả nhà sản xuất</a></li>
                      <li><a href="{{url('admin/addmanufactures')}}">Thêm hiệu sản xuất</a></li>
                      <li><a href="{{asset('allprotypes')}}">Xem tất cả loại hàng</a></li>
                      <li><a href="{{url('admin/addprotypes')}}">Thêm loại hàng</a></li>
                      <li><a href="{{asset('allusers')}}">Quản lí người dùng</a></li> -->


                    </ul>
                  </li>
                  
                  


                <li><a><i class="fa fa-sitemap"></i> Quản lí người dùng <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{asset('users')}}">Danh sách người dùng</a></li>
                  <li><a href="{{asset('users/add')}}">Thêm người dùng</a></li>


                      </li>
                  </ul>
                </li>
                <!-- <li><a><i class="fa fa-book"></i> Quản lí mua hàng <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                  <li><a href="{{asset('allbills')}}">Danh sách đơn hàng</a></li>


                      </li> -->



                </ul>
              </div>
              <div class="menu_section">


              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="admin/admin_logo_by_lucifercho_d39lpuk-fullview.png" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="{{url('/logout-checkout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
