<?php $cart = session()->has('cart') ? session('cart') : null ?>
<a href="#" class="close-side"><i class="fa fa-times"></i></a>
<li class="cart-box">
    <ul class="cart-list">
        @if($cart != null)    
        <?php $grand_price = 0; ?>
        @foreach($cart as $key => $value)
        @foreach($value as $key => $item)
        <?php
            $sub_price = $item['price'] * $item['quantity'];
            $grand_price += $item['price']*$item['quantity'];
        ?>
        <li>
            <a href="#" class="photo"><img src="{{ asset('images/' . $item['image']) }}" class="cart-thumb" alt="" /></a>
            <h6><a href="#">{{ $item['name'] }}</a></h6>
            <p>{{ $item['quantity'] }}x - {{ $item['size_name'] }} - <span class="price">{{ number_format($sub_price,0) }} Đ</span></p>
        </li>
        @endforeach
        @endforeach     
        @else
        <h6><a href="#">Your cart is empty</a></h6>
        @endif
    </ul>
    <div class="total" style="display:flex;flex-direction:column;">
        <div class="div">
            <a href="{{ route('cart') }}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
        </div>
        <div class="float-right"><strong>Total</strong>: <span class="grand">{{ ($cart != null) ? number_format($grand_price,0) : "0" }}</span> Đ</div>
    </div>
</li>
