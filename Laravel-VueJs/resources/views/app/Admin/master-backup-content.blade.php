 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-text mx-3">AntGreen Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="buttons.html">Buttons</a>
          <a class="collapse-item" href="cards.html">Cards</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Utilities:</h6>
          <a class="collapse-item" href="utilities-color.html">Colors</a>
          <a class="collapse-item" href="utilities-border.html">Borders</a>
          <a class="collapse-item" href="utilities-animation.html">Animations</a>
          <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
      </div>
    </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li>

          <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <!-- Counter - Alerts -->
              <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
                Alerts Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 7, 2019</div>
                  $290.29 has been deposited into your account!
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 2, 2019</div>
                  Spending Alert: We've noticed unusually high spending for your account.
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
          </li>

          <!-- Nav Item - Messages -->
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <!-- Counter - Messages -->
              <span class="badge badge-danger badge-counter">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">
                Message Center
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                  <div class="small text-gray-500">Emily Fowler · 58m</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                  <div class="status-indicator"></div>
                </div>
                <div>
                  <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                  <div class="small text-gray-500">Jae Chun · 1d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                  <div class="status-indicator bg-warning"></div>
                </div>
                <div>
                  <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                  <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                </div>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div>
                  <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                  <div class="small text-gray-500">Chicken the Dog · 2w</div>
                </div>
              </a>
              <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="adminName2">
              </span>
              <img class="img-profile rounded-circle" src="img/admin.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="user.html">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
              </a>
              <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->



        <!-- Content Row -->

        <div class="row">

          <!-- Area Chart -->
          <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 col-xl-12 col-lg-12 float-left">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Sản Phẩm</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <a data-toggle="modal" data-target="#exampleModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm sản phẩm</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Mã SP</th>
                      <th>Hình Ảnh</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Giá Sản Phẩm</th>
                      <th>Xuất Xứ</th>
                      <th>Danh Mục</th>
                      <th>Hiển thị</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody id="listProductInAdmin"></tbody>
                </table>
            </div>
          </div>

<!-- Modal thêm sản phẩm -->
<div class="modal fade modal-panel" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleCreate">Thêm mới sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="error" style="font-size: 11px; color: red"></div>
        <!-- body -->
        <form name="myForm">
          <div class="form-group">
        <label for="exampleInputEmail1">Product Name<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="inputName" >
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
          <label for="exampleInputEmail1">Price<span style="color: red">*</span></label>
          <input type="number" class="form-control" id="inputPrice">
        </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
          <label for="exampleInputEmail1">Product Code<span style="color: red">*</span></label>
          <input type="text" class="form-control" id="inputId" value="SP0001">
        </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product Image<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="inputImg" value="img/cay1.jpg">
      </div>
      <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Feature Product<span style="color: red">*</span></label>
        <select class="form-control" id="inputFea">
          <option value="1">Hiển Thị</option>
          <option value="0">Ẩn</option>
        </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Product Category<span style="color: red">*</span></label>
          <select class="form-control" id="inputCate">
          <option value="1">Tiêu cảnh để bàn</option>
          <option value="2">Chậu cảnh để bàn</option>
          <option value="3">Chậu cảnh mini</option>
          <option value="4">Phị kiện trang trí</option>
          <option value="5">Sen đá</option>
        </select>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group">
          <label for="exampleInputEmail1">Product Origin<span style="color: red">*</span></label>
          <select class="form-control" id="inputOrigin">
          <option value="Việt Nam">Việt Nam</option>
          <option value="Nhật Bản">Nhật Bản</option>
        </select>
        </div>
      </div>
    </div>
        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitButtons">
          <button type="button" class="btn btn-primary" onclick="addNewLocalProduct()">Thêm sản phẩm</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal thêm sản phẩm -->


         <!--  <div class="col-xl-4 col-lg-4 float-left">
            <div class="card shadow mb-4">

              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                  <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                  <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> Direct
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> Social
                  </span>
                  <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> Referral
                  </span>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Content Column -->
          <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê</h6>
              </div>
              <div class="card-body">
                <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="tksp-item">
                    <p>Tiêu cảnh để bàn: <span class="badge badge-pill badge-primary"><span id="countTieuCanhDeBanAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Chậu cảnh để bàn: <span class="badge badge-pill badge-success"><span id="countChauCanhDeBanAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Chậu cảnh mini: <span class="badge badge-pill badge-danger"><span id="countChauCanhMiniAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Phụ kiện trang trí: <span class="badge badge-pill badge-warning"><span id="countPhuKienTrangTriAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Sen đá: <span class="badge badge-pill badge-info"><span id="sendaAdmin"></span></span></p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                  <div class="tksp-item">
                    <p>Tổng số user: <span class="badge badge-pill badge-info"><span id="allUserAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Tổng số quản trị viên: <span class="badge badge-pill badge-success"><span id="adminRoleInAdmin"></span></span></p>
                  </div>
                  <div class="tksp-item">
                    <p>Tổng số cộng tác bán hàng: <span class="badge badge-pill badge-danger"><span id="adminSellerInAdmin"></span></span></p>
                  </div>
                </div>
              </div>


                <!-- <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
              </div>
            </div>

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Menu</h6>
              </div>
              <div class="card-body">
                <a data-toggle="modal" data-target="#modalMenu" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm mới menu</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Menu Name</th>
                      <th>Link</th>
                      <th>Chuyển Hướng</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody id="cmsMenuInAdmin"></tbody>
                </table>
              </div>
            </div>
<!-- Modal thêm menu -->
<div class="modal fade modal-panel" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenu" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleMenu">Thêm mới menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body -->
        <form name="myForm">
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="menuId">ID</label>
                <input type="text" class="form-control" id="menuId" placeholder="1">
              </div>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <label for="menuName">Menu Name</label>
                <input type="text" class="form-control" id="menuName">
              </div>
            </div>
          </div>

              <div class="form-group">
                <label for="menuLink">Menu Link</label>
                <input type="text" class="form-control" id="menuLink" placeholder="#">
              </div>

              <div class="form-group">
                <label for="menuProperty">Menu Property</label>
                <input type="text" class="form-control" id="menuProperty">
              </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="menuTarget">Target</label>
                <select class="form-control" id="menuTarget">
                <option value="_seft">_seft</option>
                <option value="_blank">_blank</option>
                <option value="_parent">_parent</option>
                <option value="_top">_top</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="menuStatus">Status</label>
                <select class="form-control" id="menuStatus">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
              </div>
            </div>
          </div>
        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitButtonMenu">
          <button type="button" class="btn btn-primary" onclick="addNewLocalMenu()">Thêm mới menu</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal thêm menu -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Coupon</h6>
              </div>
              <div class="card-body">
                <a data-toggle="modal" data-target="#modalCoupon" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm mới coupon</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Detail</th>
                      <th>Value</th>
                      <th>Trạng Thái</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody id="listCouponInAdmin"></tbody>
                </table>
              </div>
            </div>
<!-- Modal thêm coupon -->
<div class="modal fade modal-panel" id="modalCoupon" tabindex="-1" role="dialog" aria-labelledby="modalCoupon" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleCoupon">Thêm mới coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body -->
        <form name="myForm">
          <div class="form-group">
            <label for="couponCode">Code</label>
              <input type="text" class="form-control" id="couponCode">
          </div>
          <div class="form-group">
            <label for="couponDetail">Detail</label>
              <textarea type="text" class="form-control" id="couponDetail"></textarea>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="couponValue">Value</label>
                  <input type="text" class="form-control" id="couponValue"></input>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="couponStatus">Status</label>
                <select class="form-control" id="couponStatus">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="couponBegin">Date Begin</label>
                  <input type="date" class="form-control" id="couponBegin"></input>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="couponEnd">Date End</label>
                  <input type="date" class="form-control" id="couponEnd"></input>
              </div>
            </div>
          </div>
        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitButtonCoupon">
          <button type="button" class="btn btn-primary" onclick="addNewLocalCoupon()">Thêm mới coupon</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal thêm coupon -->
            <!-- Color System -->
            <!-- <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                  <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                  <div class="card-body">
                    Success
                    <div class="text-white-50 small">#1cc88a</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                  <div class="card-body">
                    Info
                    <div class="text-white-50 small">#36b9cc</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                  <div class="card-body">
                    Warning
                    <div class="text-white-50 small">#f6c23e</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                  <div class="card-body">
                    Danger
                    <div class="text-white-50 small">#e74a3b</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                  <div class="card-body">
                    Secondary
                    <div class="text-white-50 small">#858796</div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>

          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Tài Khoản</h6>
              </div>
              <div class="card-body">
                <a data-toggle="modal" data-target="#addAcc" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm tài khoản</a>
                <small style="display: block;">Admin không có quyền xóa tài khoản hoặc chỉnh sửa thông tin tài khoản. Admin chỉ có thể Khóa, Kích hoạt tài khoản và Phân quyền tài khoản.</small>
                <table class="table table-responsive" id="manageAcc">
                  <thead>
                    <th>Họ tên</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Phân quyền</th>
                    <th>Trạng Thái</th>
                    <th>Hành động</th>
                  </thead>
                  <tbody id="listUser"></tbody>
                </table>
              </div>
            </div>
<!-- Modal Thêm tài khoản -->
<div class="modal fade modal-panel" id="addAcc" tabindex="-1" role="dialog" aria-labelledby="addAcc" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleAcc">Thêm mới tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body -->
        <form name="myFormAcc">
          <div class="form-group">
            <label for="e_username">UserName</label>
            <input type="text" class="form-control" id="e_username">
          </div>
          <div class="form-group">
            <label for="e_name">Name</label>
            <input type="text" class="form-control" id="e_name">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="e_password">Password</label>
                <input type="password" class="form-control" id="e_password">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="e_repassword">RePassword</label>
                <input type="password" class="form-control" id="e_repassword">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="e_role">Role</label>
                <select class="form-control" id="e_role">
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="e_status">Status</label>
                <select class="form-control" id="e_status">
                <option value="kích hoạt">Kích hoạt</option>
                <option value="khóa">Khóa</option>
              </select>
              </div>
            </div>
          </div>

        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitButton2">
          <button type="button" class="btn btn-primary" onclick="addNewLocalAccount()">Thêm tài khoản</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal thêm tài khoản -->
            <!-- Approach -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý Slide</h6>
              </div>

              <div class="card-body">
                <a data-toggle="modal" data-target="#modalSlide" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm mới slide</a>
                <small class="d-block text-danger"><b>Lưu ý:</b> Bắt buộc phải có 3 và chỉ 3 slide được Hiển thị.</small>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Hình Ảnh</th>
                      <th>Tiêu đề</th>
                      <th>Mô tả</th>
                      <th>Trạng Thái</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody id="cmsSlideInAdmin"></tbody>
                </table>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<!-- Modal Thêm slide -->
<div class="modal fade modal-panel" id="modalSlide" tabindex="-1" role="dialog" aria-labelledby="modalSlide" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleSlide">Thêm mới slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body -->
        <form name="myFormAcc">
        <div class="form-group">
            <label for="sTitle">Tiêu đề</label>
            <input type="text" class="form-control" id="sTitle">
          </div>
          <div class="form-group">
            <label for="sImage">Hình Ảnh</label>
            <input type="text" class="form-control" id="sImage" value="img/slider_1.jpg">
          </div>
          <div class="form-group">
            <label for="sDescription">Mô tả</label>
            <textarea type="text" class="form-control" id="sDescription"></textarea>
          </div>
          <div class="form-group">
            <label for="sLink">Link to</label>
            <input type="text" class="form-control" id="sLink" value="#">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="sStatus">Status</label>
                <select class="form-control" id="sStatus">
                <option value="">Mặc định</option>
                <option value="active">Active</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="sActive">Trạng Thái</label>
                <select class="form-control" id="sActive">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
              </select>
              </div>
            </div>
          </div>
        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitButtonSlide">
          <button type="button" class="btn btn-primary" onclick="addNewLocalSlide()">Thêm mới slide</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal thêm slide -->


<!-- Quản lý tin tức -->
<div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4 col-xl-12 col-lg-12 float-left">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Quản Lý tin tức</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <a data-toggle="modal" data-target="#modalPost" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-2" style="color: white"><i class="fa fa-plus fa-sm text-white-50" aria-hidden="true"></i> Thêm bài viết mới</a>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Mã</th>
                      <th>Tiêu đề</th>
                      <th>Hình Ảnh</th>
                      <th>Mô tả</th>
                      <th>Slug</th>
                      <th>Nội dung</th>
                      <th>Tags</th>
                      <th>Người tạo</th>
                      <th>Hiển thị</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody id="listPostInAdmin"></tbody>
                </table>
            </div>
          </div>

<!-- Modal thêm bài viết-->
<div class="modal fade modal-panel" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="modalPost" aria-hidden="true" style="z-index: 9999">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitlePost">Thêm bài viết mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body -->
    <form name="myForm">
       <div class="form-group">
        <label for="postTitle">Title<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="postTitle" >
      </div>
      <div class="form-group">
        <label for="postSlug">Slug<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="postSlug" >
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
          <label for="postId">Post Id<span style="color: red">*</span></label>
          <input type="number" class="form-control" id="postId" value="5">
        </div>
        </div>
        <div class="col-sm-9">
          <div class="form-group">
          <label for="postImage">Image<span style="color: red">*</span></label>
          <input type="text" class="form-control" id="postImage"  value="img/news1.jpg">
        </div>
        </div>
      </div>
      <div class="form-group">
        <label for="postMeta">Description<span style="color: red">*</span></label>
        <textarea class="form-control" id="postMeta"></textarea>
      </div>
      <div class="form-group">
        <label for="postContent">Main Content<span style="color: red">*</span></label>
        <textarea class="form-control" id="postContent"></textarea>
      </div>
      <div class="form-group">
        <label for="postTags">Tags<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="postTags" >
      </div>
      <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
          <label for="postStatus">Publish<span style="color: red">*</span></label>
        <select class="form-control" id="postStatus">
          <option value="1">Xuất bản</option>
          <option value="0">Nháp</option>
        </select>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="form-group">
        <label for="postAuthor">Created by<span style="color: red">*</span></label>
        <input type="text" class="form-control" id="postAuthor" value="admin">
      </div>
      </div>
    </div>
        </form>
        <!-- end body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div id="submitPosts">
          <button type="button" class="btn btn-primary" onclick="addNewLocalPost()">Thêm bài viết mới</button>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end Modal bài viết -->


        </div>
    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Đăng xuất khỏi phần admin.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="index.html" onclick="logout()">Logout</a>
      </div>
    </div>
  </div>
