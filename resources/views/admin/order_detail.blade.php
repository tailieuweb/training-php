@extends('admin.shared.master')
@section('content')
@include('admin.shared.header')
@include('admin.shared.sidebar')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Order Detail
            </header>
                <h4 class="col-md-3">Customer</h4>
                <div class="col-md-9">
                    <table class="table table-bordered table-sm table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $customer->type }}</td>
                                <td>{{ $person->full_name }}</td>
                                <td>{{ $person->gender }}</td>
                                <td>{{ $person->address }}</td>
                                <td>{{ $person->date_of_birth }}</td>
                                <td>{{ $person->phone }}</td>
                                <td>{{ $person->email }}</td>
                                <td>{{ $account->user_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="wrapper-detail" style="padding-left:15px;">
                    <div class="row mb-1">
                        <h4 class="col-md-3">Note</h4>
                        <div class="col-md-9"><h4>{{ ($order->note == '') ? 'Empty' : $order->note }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Order Time</h4>
                        <div class="col-md-9"><h4>{{ $order->created_at }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Grand total</h4>
                        <div class="col-md-9"><h4>{{ $order->total_quantity }}</h4></div>
                    </div>
                    <div class="row mb-1">
                        <h4 class="col-md-3">Grand price</h4>
                        <div class="col-md-9"><h4>{{ number_format($order->grand_price,0) }}</h4></div>
                    </div>
                    <form method="post">
                        <div class="row mb-1">
                            <h4 class="col-md-3">Status</h4>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4 col-sm-7">
                                        <?php
                                        $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $result = $string1 . base64_encode($order->id) . $string2;
                                        $string3 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $string4 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $result1 = $string3 . base64_encode(0) . $string4;
                                        $string5 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $string6 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $result2 = $string5 . base64_encode(1) . $string6;
                                        $string7 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $string8 = substr(str_shuffle($permitted_chars), 0, 36);
                                        $result3 = $string7 . base64_encode(2) . $string8;
                                        ?>
                                        <select name="status" class="form-control mb-1 status-update" data-order-id="{{ $result }}">
                                            @if($order->status == 'cancel')
                                            <option selected>Cancel</option>
                                            @else
                                            <option value="{{ $result1 }}" {{ ($order->status == 'progress') ? 'selected' : '' }}>Progress</option>
                                            <option value="{{ $result2 }}" {{ ($order->status == 'delivery') ? 'selected' : '' }}>Delivery</option>
                                            <option value="{{ $result3 }}" {{ ($order->status == 'received') ? 'selected' : '' }}>Received</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--  -->
                    <div class="row">
                        <h4 class="col-md-3">Product List</h4>
                        <div style="max-height: 300px;overflow-y: scroll;margin-bottom:20px;" class="col-md-7">
                            <table class="table table-hover table-sm table-responsive" style="width: 100%">
                                <tbody>
                                    @foreach($order_detail as $key => $item)
                                    <tr>
                                        <td style="text-align: center;">
                                            <img src="{{ asset('images/' . $product->getProductById($item->product_id)->pro_image) }}" style="width: 70px">
                                        </td>
                                        <td>
                                            <a href="">{{ $product->getProductById($item->product_id)->name }}</a>
                                            <p>{{ number_format($product->getProductById($item->product_id)->price,0) }} x {{ $item->size }} x {{ $item->quantity }}</p>
                                        </td>
                                        <td>Grand price
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
                </div>
        </section>
    </section>
</section>
<footer class="site-footer">
    <div class="text-center">
        2013 &copy; FlatLab by VectorLab.
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
@endsection