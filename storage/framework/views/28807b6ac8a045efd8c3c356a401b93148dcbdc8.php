

<?php $__env->startSection('content'); ?>

 <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-bg">
                     <div class="padding_lert">
                        <h1>WELCOME TO HOTEL Felicity </h1>
                        <span>LANDING PAGE 2019</span>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                        <a href="#">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- form_lebal -->
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <form method="POST" action="<?php echo e(asset('details')); ?>" class="form_book">
                     <!-- Add csrf token -->
                     <?php echo csrf_field(); ?>
                     <div class="row">
                        <div class="col-md-3">
                           <label class="date">ARRIVAL DATE</label>
                           <input class="book_n" type="date" name="pick-up">
                        </div>
                        <div class="col-md-3">
                           <label class="date">DEPARTURE DATE</label>
                           <input class="book_n" type="date" name="drop-off">
                        </div>
                        <div class="col-md-3">
                           <label class="date">PERSON</label>
                           <input class="book_n" placeholder="2" type="type" name="person">
                        </div>
                        <div class="col-md-3">
                           <button class="book_btn" type="submit">Book Now</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- end form_lebal -->
      <!-- choose  section -->
      <div class="choose">
         
          <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Feature</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" class="img-fluid" style="border-radius: 10px;" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
          </div>
      </div>
      <!-- end choose  section -->

      <!-- feature  section -->
      <div class="choose">
         <div class="container">
            <div class="row">
               <div class="col-md-12 mt-5">
                  <div class="titlepage">
                     <h2>Hot Hotel</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="choose_box">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Choose The Perfect</span> <br>Hotel</h2>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                     <a class="read_more" href="detail.html">Book Now</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="img_box">
                           <figure><img src="<?php echo e(url('frontend/images/img1.jpg')); ?>" alt="#"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="<?php echo e(url('frontend/images/img2.jpg')); ?>" alt="#"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="<?php echo e(url('frontend/images/img3.jpg')); ?>" alt="#"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end feature  section -->

      <!-- our  section -->
      <div class="our">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="img_box">
                     <figure><img src="<?php echo e(url('frontend/images/img4.jpg')); ?>" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="our_box">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Favorite </span> <br>Hotel</h2>
                     </div>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                     <a class="read_more" href="detail.html">Book Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end our  section -->
      <!-- about -->
      <div id="about"  class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="about_text">
                     <div class="titlepage">
                        <h2>About Our Hotel</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img">
                     <figure><img src="<?php echo e(url('frontend/images/about_im')); ?>g.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      <!-- testimonial -->
      <div class="testimonial">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Testimonial</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousels" class="carousel slide testimonial_Carousel " data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousels" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousels" data-slide-to="1"></li>
                        <li data-target="#myCarousels" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption ">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption">
                                 <div class="row">
                                    <div class="col-md-6 margin_boot">
                                       <div class="test_box">
                                          <h4>Mark jonson</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="test_box">
                                          <h4>Mac Du</h4>
                                          <i><img src="<?php echo e(url('frontend/images/te1.png"')); ?> alt="#"/></i>
                                          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousels" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousels" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end testimonial -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Music\project-nhom-C-chuyen-de-web1\project-web1\resources\views/Frontend/layout/index.blade.php ENDPATH**/ ?>