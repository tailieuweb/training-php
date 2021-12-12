@extends('customer.shared.master')
@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Your Order</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active">Your Order</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- giao diện chi tiết cho đơn hàng -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2>Your Order</h2>
                <div class="card-body border bg-white rounded">
                    <div class="row mb-1">
                        <h4 class="col-md-3">Full name</h4>
                        <div class="col-md-9"><h4>{{ $person->full_name }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Address</h4>
                        <div class="col-md-9"><h4>{{ $person->address }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Note</h4>
                        <div class="col-md-9"><h4>{{ ($order->note == '') ? 'Empty' : $order->note }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Order date</h4>
                        <div class="col-md-9"><h4>{{ $order->created_at }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Quantity</h4>
                        <div class="col-md-9"><h4>{{ $order->total_quantity }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Grand Price</h4>
                        <div class="col-md-9"><h4>{{ number_format($order->grand_price,0) }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Status</h4>
                        <div class="col-md-4">
                            <!--Kiểm tra trạng thái đơn hàng  -->
                            <?php
                                if($order->status == 'progress') {
                                    $color = 'warning';
                                } else if($order->status == 'delivery') {
                                    $color = 'info';
                                } else if($order->status == 'cancel') {
                                    $color = 'danger';
                                } else {
                                    $color = 'success';
                                }
                            ?>
                            <div class="btn btn-{{ $color }}">{{ $order->status }}</div>
                        </div>
                    </div>
                    <!-- Đổi dữ liệu chi tiết đơn hàng -->
                    <div class="row" style="margin-top:20px;">
                        <h4 class="col-md-3">List Product</h4>
                        <div style="max-height: 300px;overflow-y: scroll;">
                            <table class="table table-hover table-sm table-responsive col-md-9"
                                style="background-color: white;">
                                <tbody>
                                    @foreach($order_detail as $key => $item)
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="{{ asset('images/' . $product->getProductById($item->product_id)->pro_image) }}" style="width: 70px">
                                        </td>
                                        <td>
                                            <a href="">{{ $product->getProductById($item->product_id)->name }}</a>
                                            <p>{{ ($product->getProductById($item->product_id)->promotion_price > 0) ? number_format($product->getProductById($item->product_id)->promotion_price,0) : number_format($product->getProductById($item->product_id)->price,0) }} x {{ $item->quantity }}</p>
                                        </td>
                                        <td style="margin-left:5px;margin-right:5px;">Size
                                            <p>{{ $item->size }}</p>
                                        </td>
                                        <td>Price
                                            <p>
                                                <b>{{ number_format($item->sub_price,0) }}</b>
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($order->status == "progress")
                    <div class="col-md-12" style="text-align:center;margin-top: 60px">
                        <a href="{{ route('getCustomerCancelOrder', $order->id) }}" class="btn btn-sm btn-danger" style="padding:10px 10px;font-size:16px;">Cancel Order</a>
                    </div>
                    @endif
                </div>
            </div>     
        </div>
    </div>
</div>
@endsection