@extends('layouts.master')
@section('contents')
@isset($product)
@section('title',$product->title)
@include('partial.breadcrumb',['here' => 'Product - '.$product->title,'name' =>$product->title])
<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <div data-thumb="{{$product->photo}}">
                            <img src="{{$product->photo}}" />
                        </div>
                        <div data-thumb="{{$product->photo}}">
                            <img src="{{$product->photo}}" />
                        </div>
                        <div data-thumb="{{$product->photo}}">
                            <img src="{{$product->photo}}" />
                        </div>
                        <div data-thumb="{{$product->photo}}">
                            <img src="{{$product->photo}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3>{{$product->title}}</h3>
                    <h2>{{number_format($product->price)}} $</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Category</span> : Living room</a>
                        </li>
                        <li>
                            <a href="#"> <span>Availibility</span> : In Stock</a>
                        </li>
                    </ul>
                    <p>
                        {{$product->summary}}
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <div class="product_count">
                            <span class="inumber-decrement"> <i class="ti ti-minus"></i></span>
                            <input class="input-number" type="text" value="1" min="0" max="10">
                            <span class="number-increment"> <i class="ti ti-plus"></i></span>
                        </div>
                        <a href="#" class="btn_3">add to cart</a>
                        <a href="#" class="like_us"> <i class="ti ti-heart"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>{{$product->description}}</p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    {{$product->size}}
                </div>
            </div>
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Coming soon!</p>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--================End Product Description Area =================-->
@endisset
@endsection