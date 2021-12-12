@extends('customer.shared.master')
@section('content')
<!-- End Top Search -->
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="carousel-item active"> <img class="d-block w-100"
                        src="{{ asset('images/' . $detail_pro->pro_image) }}" alt="First slide"> </div>
                <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{ $detail_pro->name }}</h2>
                    @if($detail_pro->promotion_price != 0)
                    <h5> <del>{{ number_format($detail_pro->price,0) }}</del>
                        {{ number_format($detail_pro->promotion_price,0)}}</h5>
                    @else
                    <h5>{{ number_format($detail_pro->price,0) }}</h5>
                    @endif
                    <p>
                    <h4>Short Description:</h4>
                    <p>{{ $detail_pro->description }}</p>
                    <ul>
                        <li>
                            <div class="form-group size-st">
                                <label class="size-label">Size</label>
                                <select id="basic" class="selectpicker show-tick form-control size">
                                    @foreach($sizes as $item)
                                    <?php
                                    $permitted_chars = '123456789';
                                    $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $string2 = substr(str_shuffle($permitted_chars), 0, 5);
                                    $result1 = $string1 . $item->id . $string2;
                                    ?>
                                    <option value="{{ $result1 }}">{{ $item->name }}<label></label></option>
                                    @endforeach
                                </select>
                                <?php
                                    $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $string3 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $string4 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $result2 = $string3 . base64_encode($detail_pro->id) . $string4;
                                    ?>
                                <input class="form-control product-id" value="{{ $result2 }}" type="hidden">
                            </div>
                        </li>
                    </ul>
                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover add-to-cart">Add to cart</a>
                            <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                        </div>
                    </div>

                    <div class="add-to-btn">
                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- comments -->
        <section class="content-item" id="comments"
            style="box-shadow: 0 -1px 6px 1px rgb(0 0 0 / 10%);margin-top: 65px; padding: 30px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if(Auth::guard('account_customer')->check()) 
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('postComment') }}">
                                    @csrf
                                    <?php $account_id =  Auth::guard('account_customer')->user()->id ?>
                                    <?php
                                    $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $string5 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $string6 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $result3 = $string5 . base64_encode($account_id) . $string6;
                                    ?>     
                                    <input type="hidden" name="account_id" value="{{ $result3 }}">
                                    <input type="hidden" name="pro_id" value="{{ $result2 }}">
                                    <h3 class="pull-left">New Comment</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" id="content" name="content" placeholder="Your Comment" required=""></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-normal pull-right" style="margin-left: 93%;">Submit</button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @if(count($list_comment)>0)
                        <h3>{{ count($list_comment) }} Comments</h3>
                        <div class="media">
                            <div class="media-body">
                                @foreach($list_comment as $comment)
                                <div class="comment-single" style="border-top: 1px dashed #DDDDDD;padding: 20px 0;">
                                    <h3 class="media-heading" style="font-family: 'Lato', sans-serif;;font-weight: bold;font-size:20px;"><span>@</span>{{ $account->getAccountById($comment->account_id)->user_name }}</h3>
                                    <h4 style="font-family: sans-serif; clear: left">{{ $comment->content }}</h4>
                                    <ul class="list-unstyled list-inline media-detail pull-left">
                                        <li><i class="" style="font-weight: 600;">{{ $comment->created_at }}</i></li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="media">
                            <div class="media-body">
                                <p>Chưa có bình luận nào</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- end comments -->
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($lienquan_pro as $item)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{ asset('images/' . $item->pro_image) }}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="{{ route('detail',$item->id) }}" data-toggle="tooltip"
                                                data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{ $item->name }}</h4>
                                <h5>
                                    @if($item->promotion_price > 0)
                                    <del>{{ number_format($item->promotion_price) }}</del>
                                    {{ number_format($item->promotion_price) }}
                                    @else
                                    {{ number_format($item->price) }}
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
<!-- Start Instagram Feed  -->
@endsection