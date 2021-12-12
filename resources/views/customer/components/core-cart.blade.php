<div class="row">
    <div class="col-lg-12 update-cart" data-url="{{ route('updateCart') }}">
        <div class="table-main table-responsive delete-cart" data-url="{{ route('deleteCart') }}">
            @if(session()->get('cart') != null)
            <?php
            $grand_price = 0;
            $grand_total = 0;
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Update</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $key => $value)
                    @foreach($value as $keys => $item)
                    <?php
                    $sub_price = $item['price'] * $item['quantity']; 
                    $grand_price += $item['price']*$item['quantity'];
                    $grand_total += $item['quantity'];
                    ?>
                    <tr>
                        <td class="thumbnail-img">
                            <a href="{{ route('detail',$item['name']) }}">
                            <img class="img-fluid" src="{{ asset('images/' . $item['image']) }}" alt="" />
                            </a>
                        </td>
                        <td class="name-pr">
                            <a href="{{ route('detail',$item['name']) }}">{{ $item['name'] }}</a>
                        </td>
                        <td class="name-pr">
                            {{ $item['size_name'] }}
                        </td>
                        <td class="price-pr">
                            <p>{{ number_format($item['price'],0) }}</p>
                        </td>
                        <td class="quantity-box"><input type="number" size="4" value="{{ $item['quantity'] }}" min="1" step="1" class="c-input-text qty text quantity"></td>
                        <td class="total-pr">
                            <p>{{ number_format($sub_price,0) }}</p>
                        </td>
                        <?php
                        $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string3 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string4 = substr(str_shuffle($permitted_chars), 0, 36);
                        $result = $string1 . base64_encode($key) . $string2;
                        $result2 = $string3 . base64_encode($keys) . $string4;
                        ?>
                        <td class="remove-pr cart-update" data-id="{{ $result }}" data-sub-id="{{ $result2 }}" style="cursor:pointer;">
                            <i class="fas fa-edit"></i>
                        </td>
                        <?php
                        $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $string5 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string6 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string7 = substr(str_shuffle($permitted_chars), 0, 36);
                        $string8 = substr(str_shuffle($permitted_chars), 0, 36);
                        $result3 = $string5. base64_encode($key) . $string6;
                        $result4 = $string7 . base64_encode($keys) . $string8;
                        ?>
                        <td class="remove-pr cart-delete" data-id="{{ $result3 }}" data-sub-id="{{ $result4 }}" style="cursor:pointer;">
                            <i class="fas fa-times"></i>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                    @else
                    <tr>
                        <td>
                            <h2 style="text-align:center;">Your cart is empty !!!</h2>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@if(session()->get('cart') != null)
<div class="row my-5">
    <div class="col-lg-12 col-sm-12">
        <a href="{{ route('deleteAllCart') }}" class="col-12 flex btn hvr-hover">Delete All</a>
    </div>
</div>
@endif
<div class="row my-5">
    <div class="col-lg-8 col-sm-12"></div>
    <div class="col-lg-4 col-sm-12">
        <div class="order-box">
            @if(session()->get('cart') != null)
            <h3>Order summary</h3>
            <hr class="my-1">
            <div class="d-flex gr-total">
                <h5>Grand Total</h5>
                <div class="ml-auto h5">{{ number_format($grand_total) }}</div>
            </div>
            <hr>
            <div class="d-flex gr-total">
                <h5>Grand Price</h5>
                <div class="ml-auto h5">{{ number_format($grand_price) }}</div>
            </div>
            <hr>
            <div class="col-12 d-flex shopping-box"><a href="{{ route('checkout') }}" class="ml-auto btn hvr-hover">Checkout</a> </div>
            @endif
        </div>
    </div>
</div>