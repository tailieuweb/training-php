@extends('customer.shared.master')
@section('content')
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Your Profile</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active">Your Account</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>Profile</h2>
                    <p>Full name : {{ $person->full_name }}</p>
                    <p>Gender : {{ $person->gender }}</p>
                    <p>Birthday : {{ $person->date_of_birth }}</p>
                    <p>Type : {{ $customer->type }}</p>
                    <ul>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>Address: {{ $person->address }}</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">{{ $person->phone }}</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">{{ $person->email }}</a></p>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('customerEditProfile') }}" class="btn hvr-hover" style="margin-top:20px;">Edit profile</a>
            </div>
            <div class="col-lg-8 col-sm-12">
                    <h2>Your Order</h2>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order time</th>
                            <th>Grand price</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- Xuất tất cả các đơn hàng -->
                        @foreach($order as $key => $item)
                        <tr class="">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ number_format($item->grand_price,0) }}</td>
                            <td>{{ ($item->note == '') ? 'Empty' : $item->note }}</td>
                            <td>
                                <?php
                                    if($item->status == 'progress') {
                                        $color = 'warning';
                                    } else if($item->status == 'delivery') {
                                        $color = 'info';
                                    } else if($item->status == 'cancel') {
                                        $color = 'danger';
                                    } else {
                                        $color = 'success';
                                    }
                                ?>
                                <div class="btn btn-{{ $color }}">{{ $item->status }}</div>
                            </td>
                            <td class="eye-detail"><a href="{{ route('getCustomerOrderDetail', $item->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>           
            </div>
        </div>
    </div>
</div>
@endsection
    