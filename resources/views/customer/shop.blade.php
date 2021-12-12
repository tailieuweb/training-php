@extends('customer.shared.master')
@section('content')
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            @foreach($type as $item)
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{ $item->type_name }}<small class="text-muted"></small>
								</a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach($protype->getProtypeByTypeId($item->type_id) as $item1)
                                            <a href="{{ route('shop',$item1->protype_name) }}" class="list-group-item list-group-item-action">{{ $item1->protype_name }}<small class="text-muted"> ({{ $product->countProductByProtypeId($item1->id) }})</small></a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="brand-box">
                                <ul>
                                    @foreach($manu as $item)
                                    <li>
                                        <div class="radio radio-danger" style="cursor:pointer">
                                            <a href="{{ route('shop',$item->manu_name) }}"> {{ $item->manu_name }} </a>
                                        </div>
                                    </li>  
                                    @endforeach                      
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        @include('customer.filter')
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach($list_product as $item)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                    @if($item->promotion_price != 0)
                                                    <p class="sale">Sale</p>
                                                    @endif
                                                    </div>
                                                    <img src="{{ asset('images/' . $item->pro_image ) }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="{{ route('detail',$item->pro_id) }}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{ $item->name }}</h4>
                                                    @if($item->promotion_price != 0)
                                                    <del>{{ number_format($item->price,0) }} VND</del>
                                                    <h5>{{ number_format($item->promotion_price,0) }} VND</h5>                           
                                                    @else 
                                                    <h5>{{ number_format($item->price,0) }} VND</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    @foreach($list_product as $item)
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                        @if($item->promotion_price != 0)
                                                        <p class="sale">Sale</p>
                                                        @endif
                                                        </div>
                                                        <img src="{{ asset('images/' . $item->pro_image) }}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="{{ route('detail',$item->pro_id) }}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>{{ $item->name }}</h4>
                                                    <h5>
                                                        @if($item->promotion_price > 0)
                                                        <del>{{ number_format($item->promotion_price) }}</del> {{ number_format($item->promotion_price) }}
                                                        @else
                                                        {{ number_format($item->price) }}
                                                        @endif
                                                    </h5>
                                                    <p>{{ $item->description }}</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div>{{ $list_product->appends($_GET)->links() }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection