@extends('layouts.master')
@section('title','List of products')
@section('contents')
@include('partial.breadcrumb',['name' => 'Products list','here' => 'Products'])
<!--================ Products Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    @include('partial.sidebar')
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu d-flex">
                                <h5>short by : </h5>
                                <select>
                                    <option data-display="Select">name</option>
                                    <option value="1">price</option>
                                    <option value="2">product</option>
                                </select>
                            </div>
                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search" aria-describedby="inputGroupPrepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="ti ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center latest_product_inner">
                    <!-- Show product list x9 -->

                    @isset($products)
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">
                            <a href="{{route('product.detail',$product->slug)}}"><img src="{{$product->photo}}" alt="{{$product->title}}"></a>
                            <div class="single_product_text">
                                <h4>{{$product->title}}</h4>
                                <h3>{{number_format($product->price)}} $</h3>
                                <a href="#" class="add_cart">+ add to cart<i class="ti ti-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endisset

                    <!-- End show product list x9 -->
                    <div class="col-lg-12">
                        {{$products->links('layouts.paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Products Area =================-->
@endsection
@push('styles')
<link rel="stylesheet" href="{{url('css/nice-select.css')}}">
@endpush