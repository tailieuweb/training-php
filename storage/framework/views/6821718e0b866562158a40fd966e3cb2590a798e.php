
<?php $__env->startSection('content'); ?>
<!-- banner -->
<section class="banner_search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-bg">
                    <div class="padding_lert">
                        <h1> Home > Detail </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->
<!-- form_lebal -->
<!-- gray bg -->
<section class="container tm-detail-section">
    <?php $__currentLoopData = $all_hotel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="hotel-details">
                <div class="img rounded">
                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide snip0019">
                                    <img src="<?php echo e(asset('')); ?>img/hotel/<?php echo e($all_hotel->image); ?>" style="background-position: center center" class="img-fluid" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hotel-description mt-4" style="border-bottom: 1px solid #95837c;">
                <div class="d-flex">
                    <div class="name w-50">
                        <h3> <i><?php echo e($all_hotel->name); ?></i></h3>
                    </div>
                    <?php for($int = 1;$int <= $rating_number;$int++): ?> <div class="rating-detail w-50">
                        <div class="wrapper">
                            <?php for($int = 1;$int
                            <= $rating_number;$int++): ?> <input name="ratingRadio" type="radio" id="<?php echo 'st' . $int ?>" value="<?php echo $int ?>" />
                            <label for="<?php echo 'st' .  $int ?>"></label>
                            <?php endfor; ?>
                            <?php if ($rating_number < 5) {
                                for ($i = 1; $i <= 5 - $rating_number; $i++) { ?>
                                    <input name="ratingRadio" type="radio" id="<?php echo 'st' . $i ?>" value="<?php echo $i ?>" />
                                    <label class="disactive" for="<?php echo 'st' .  $i ?>"></label>
                            <?php   }
                            } ?>
                        </div>
                </div>
                <?php endfor; ?>

            </div>
        </div>

        <div class="price w-75">
            <div class="show mb-3">
                <span><?php echo e($all_hotel->money_day); ?></span>/day
            </div>
            <div class="price-note">
                <div class="d-flex mb-3">
                    <div class="w-25 name">Address:</div>
                    <div class="w-75 descript"><?php echo e($all_hotel->address); ?></div>
                </div>
                <div class="d-flex mb-3">
                    <div class="w-25 name">Room:</div>
                    <div class="w-75 descript"><?php echo e($all_hotel->room); ?></div>
                </div>
                <div class="d-flex mb-3">
                    <div class="w-25 name">Bed:</div>
                    <div class="w-75 descript">King Beds</div>
                </div>
                <div class="d-flex">
                    <div class="w-25 name">Services:</div>
                    <div class="w-75 descript"> <?php echo e($all_hotel->services); ?></div>
                </div>
            </div>
        </div>
        <div class="hotel-info mt-5">
            <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui soluta modi mollitia ducimus necessitatibus labore, quidem ipsa vero. Deleniti fuga quasi libero doloremque aliquid, unde laudantium eligendi rem assumenda eum!</p>
            <p><?php echo e($all_hotel->hotel_info); ?></p>
        </div>

        <div class="review-parent pills pt-3">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="head"><?php echo e($total_comment); ?> Reviews</h3>
                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="review d-flex">
                            <div class="user-img" style="background-image: url(<?php echo e(asset('')); ?>frontend/images/person_1.jpg)"></div>
                            <div class="desc">
                                <h4>
                                    <span class="text-left"><?php echo e($value->username); ?></span>
                                    <span class="text-right"><?php echo e($value->time_cmt); ?></span>
                                </h4>
                                <p class="star">
                                    <span>
                                        <?php
                                            $rate = 5 - $value->rating;
                                            for($i=0; $i<$value->rating; $i++){ ?>
                                            <i class="ion-ios-star"></i>
                                        <?php } 
                                            for($j=0; $j<$rate; $j++){
                                        ?>
                                            <i class="ion-ios-star disable"></i>
                                        <?php } ?>
                                    </span>
                                    <span class="text-right"><a href="#" class="reply">
                                            <ion-icon name="arrow-undo-outline"></ion-icon>
                                        </a></span>
                                </p>
                                <p><?php echo e($value->content); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(!empty(Session::get('user_id'))){ ?>
                    <div class="review d-flex">
                        <div class="desc w-100">
                            <fieldset class="rating">
                                <input id="demo-1" type="radio" name="demo" value="1">
                                <label for="demo-1">1 star</label>
                                <input id="demo-2" type="radio" name="demo" value="2">
                                <label for="demo-2">2 stars</label>
                                <input id="demo-3" type="radio" name="demo" value="3">
                                <label for="demo-3">3 stars</label>
                                <input id="demo-4" type="radio" name="demo" value="4">
                                <label for="demo-4">4 stars</label>
                                <input id="demo-5" type="radio" name="demo" value="5">
                                <label for="demo-5">5 stars</label>

                                <div class="stars">
                                    <label id="rating1" for="demo-1" aria-label="1 stars" title="1 stars"></label>
                                    <label id="rating2" for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                    <label id="rating3" for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                    <label id="rating4" for="demo-4" aria-label="4 stars" title="4 stars"></label>
                                    <label id="rating5" for="demo-5" aria-label="5 stars" title="5 stars"></label>
                                </div>

                            </fieldset>
                            <!-- <?php echo e(asset('')); ?>detail/<?php echo e($all_hotel->hotel_id); ?> -->
                            <form id="user-comment" method="POST" action="#" class="request-form">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input id="rating" type="hidden" value="" name="rating">
                                    <input type="hidden" value="<?php echo e($all_hotel->hotel_id); ?>" name="hotel">
                                    <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Comment here..."></textarea>
                                </div>
                                <button name="" type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <script>
                                const rating1 = document.querySelector('#rating1');
                                const rating2 = document.querySelector('#rating2');
                                const rating3 = document.querySelector('#rating3');
                                const rating4 = document.querySelector('#rating4');
                                const rating5 = document.querySelector('#rating5');
                                const main = document.querySelector('#rating');
                                rating1.addEventListener('click', function () {
                                    main.value = 1;
                                })
                                rating2.addEventListener('click', function () {
                                    main.value = 2;
                                })
                                rating3.addEventListener('click', function () {
                                    main.value = 3;
                                })
                                rating4.addEventListener('click', function () {
                                    main.value = 4;
                                })
                                rating5.addEventListener('click', function () {
                                    main.value = 5;
                                })
                            </script>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-md-5">
                    <div class="rating-wrap">
                        <h3 class="head">Give a Review</h3>
                        <div class="wrap">
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    (98%)
                                </span>
                                <span>20 Reviews</span>
                            </p>
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    (85%)
                                </span>
                                <span>10 Reviews</span>
                            </p>
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    (70%)
                                </span>
                                <span>5 Reviews</span>
                            </p>
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    (10%)
                                </span>
                                <span>0 Reviews</span>
                            </p>
                            <p class="star">
                                <span>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    <i class="ion-ios-star"></i>
                                    (0%)
                                </span>
                                <span>0 Reviews</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <form method="POST" action="<?php echo e(asset('')); ?>payment/<?php echo e($all_hotel->hotel_id); ?>" class="form_book detail" style="margin-top: 0!important;padding: 20px !important;border: 1px solid #000;">
        <?php echo csrf_field(); ?>    
        <div class="w-100">
                <label class="date">ARRIVAL DATE</label>
                <input class="book_n" type="date" name="date_begin" required>
            </div>
            <div class="w-100 mt-3">
                <label class="date">DEPARTURE DATE</label>
                <input class="book_n" type="date" name="date_exit" required>
            </div>
            <div class="w-100 mt-3">
                <label class="date">PERSON</label>
                <input class="book_n" placeholder="2" type="type" type="type" name="<?php echo e($all_hotel->person); ?>" disabled>
            </div>
            <div class="w-100 mt-4">
                <button class="book_btn" type="submit" style="margin: 0 auto;display: block;">Book Now</button>
            </div>
        </form>

    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.index-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\training-php\resources\views/Frontend/layout/hotel/detail.blade.php ENDPATH**/ ?>