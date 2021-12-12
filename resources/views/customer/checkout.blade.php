@extends('customer.shared.master')
@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" action="{{ route('postCheckout') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Full name *</label>
                                    <input type="text" class="form-control" id="full_name" placeholder="" value="{{  $person->full_name }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Username *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" value="{{ $user->user_name }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email" value="{{  $person->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email">Phone *</label>
                                <input type="email" class="form-control" id="phone" value="{{  $person->phone }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" value="{{  $person->address }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="address">Note</label>
                                <textarea type="text" class="form-control" id="note" name="note"></textarea>
                            </div>
                            <div class="mb-3">
                            <input class="col-3 d-flex shopping-box ml-auto" style="display:flex;justify-content:center;align-item:center;padding:10px 10px;background:#d43b33;border:none;cursor:pointer;" type="submit" value="Place Order">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <?php $grand_price = 0;
                                        $grand_total = 0;
                                    ?>
                                    @foreach($cart as $key => $value)
                                    <?php $id = $key; ?>
                                    @foreach($value as $key => $item)
                                    <?php
                                        $sub_price = $item['price'] * $item['quantity']; 
                                        $grand_price += $item['price']*$item['quantity'];
                                        $grand_total += $item['quantity'];
                                    ?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{ route('detail', $id) }}">{{ $item['name'] }}</a>
                                            <div class="small text-muted">Price: {{ number_format($item['price'],0) }}<span class="mx-2">|</span> Qty: {{ $item['quantity'] }} <span class="mx-2">|</span> Subtotal: {{ number_format($sub_price,0) }}</div>
                                        </div>
                                    </div>  
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold">{{ ($customer->type != 'vip') ? '20,000' : '' }}</div>
                                </div>
                                <hr>
                                <div class="d-flex">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">{{ number_format($grand_total,0) }}</div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Price</h5>
                                    <?php
                                        if($customer->type != 'vip') {
                                            $grand_price += 20000;
                                        }
                                    ?>
                                    <div class="ml-auto h5">{{ number_format($grand_price,0) }}</div>
                                </div>
                                <hr> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection