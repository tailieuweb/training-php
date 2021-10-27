@extends('layouts.master')
@section('title','Cart')
@section('contents')
@include('partial.breadcrumb',['name' => 'Shopping Cart','here' => 'Cart'])
<!--================Cart Area =================-->
<section class="cart_area padding_top">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                @if ($carts->count() != 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{route('cart.update')}}" method="post">
                            @csrf
                            @foreach ($carts as $item)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{$item->product->photo}}" alt="{{$item->product->title}}" height="100px" width="100px" />
                                        </div>
                                        <div class="media-body">
                                            <p>{{$item->product->title}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{number_format($item->product->price)}} $</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input class="input-number text-center" type="text" name="quantity[]" value="{{$item->quantity}}" min="1">
                                        <input type="hidden" name="cartId[]" value="{{$item->id}}">
                                    </div>
                                </td>
                                <td>
                                    @php
                                    $total = $item->product->price * $item->quantity;
                                    @endphp
                                    <h5>{{number_format($total)}} $</h5>
                                </td>
                                <td>
                                    <h5><a href="{{route('cart.remove',$item->id)}}"><i class="ti ti-close" style="color:black;padding-left: 10px;"></i></a></h5>
                                </td>
                            </tr>
                            @endforeach

                            <tr class="bottom_button">
                                <td>
                                    <button type="submit" class="btn_1">Update Cart</button>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <p>Coupon function is coming soon!</p>
                                    </div>
                                </td>
                            </tr>
                        </form>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>$2160.00</h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li>
                                            <a href="#">Free Shipping</a>
                                        </li>
                                        <li class="active">
                                            <a href="#">Local Delivery: $2.00</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="checkout_btn_inner float-right">
                    <a class="btn_1" href="{{route('product.list')}}">Continue Shopping</a>
                    <!-- <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a> -->
                    <p>Checkout coming soon~</p>
                </div>
                @else
                <p class="text-center">Cart is empty!</p>
                @endif

            </div>
        </div>
</section>
<!--================End Cart Area =================-->
@endsection