<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sản phẩm | Pos Coron!</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(url('cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')); ?>">
    <link href="<?php echo e(url('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(url('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(url('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo e(url('vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="<?php echo e(url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="<?php echo e(url('build/css/custom.min.css')); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    
  <?php echo $__env->make('backend.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php if(session()->has('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session()->get('message')); ?>

                </div>
                <?php endif; ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản lí sản phẩm <small>    </small></h3>
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
                    <h2>Danh sách Hotel </h2>
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
                        <th>Image</th>
                       
                          <th>Name</th>
                          <th>Type</th>
                          <th>Status</th>
                         
                          <th style="width:50px;"></th>
                          
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                        $stt = 1;
                      ?>
                          <?php $__currentLoopData = $all_hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php $key = rand(111111111,999999999);
                          
                         ?>
                        <tr>
                        <!-- <td><?php echo e($loop->index + 1); ?></td> -->
                          <td><img src="img/hotel/<?php echo e($hotel->image); ?>" height="100" width="100" alt=""></td>
                       
                          <td><?php echo e($hotel->name); ?></td>
                          <td><?php echo e($hotel->categories_name); ?></td>
                          <td><?php echo e($hotel->status); ?></td>
                         
                          <td >
                          <div class="fa-hover col-md-3 col-sm-4  "><a href="<?php echo e(URL::to('/hotels/edithotel/'.$key.$hotel->hotel_id)); ?>"><i class="fa fa-wrench"></i></a>
                            
                              <div class="fa-hover col-md-3 col-sm-4  "><a onclick="return comfirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="<?php echo e(URL::to('/hotels/deletehotel/'.$key.$hotel->hotel_id.'/'.csrf_token())); ?>"><i class="fa fa-trash"></i></a>
                        </div>
                         
                        </td>
                        </tr>
                        <?php
        $stt++;
        ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <?php echo e($all_hotel->links()); ?>

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

     <?php echo $__env->make('backend.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html><?php /**PATH F:\training-php\resources\views/backend/layouts/Hotel/AllHotels.blade.php ENDPATH**/ ?>