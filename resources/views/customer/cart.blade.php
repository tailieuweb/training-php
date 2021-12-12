@extends('customer.shared.master')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container" id="container-cart">
            @include('customer.components.core-cart')
        </div>
    </div>
</div>
<script type="text/javascript">
    let cart_list = document.querySelector('.cart-list')
    let badge = document.querySelector('.badge')
    let grand = document.querySelector('.grand')
    //update 
    function updateCart() {
        let url = $('.update-cart').data('url');
        let id = $(this).data('id');
        let sub_id = $(this).data('sub-id');
        let quantity = $(this).parents('tr').find('input').val();
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id, sub_id: sub_id, quantity: quantity},
            success: function(data) {
                if(data.code === 200)
                {
                    let result = data.result
                    let grand_quantity = data.total
                    let grand_price = data.grand_price
                    cart_list.innerHTML = result
                    badge.innerText = grand_quantity
                    grand.innerHTML = formatNumber(grand_price) 
                    alert(data.message)
                    $('#container-cart').html(data.cart);
                }
                else {
                    window.location.replace('http://localhost:8080/Project_CDW1_NhomB/public/error-system');
                }
            }
        });
    }
    //delete 
    function deleteCart() {
        let url = $('.delete-cart').data('url');
        let id = $(this).data('id');
        let sub_id = $(this).data('sub-id');
        $.ajax({
            type: "GET",
            url: url,
            data: {id: id, sub_id: sub_id},
            success: function(data) {
                if(data.code === 200)
                {
                    let result = data.result
                    let grand_quantity = data.total
                    let grand_price = data.grand_price
                    cart_list.innerHTML = result
                    badge.innerText = grand_quantity
                    grand.innerHTML = formatNumber(grand_price)
                    alert(data.message)
                    $('#container-cart').html(data.cart);
                }
                else {
                    window.location.replace('http://localhost:8080/Project_CDW1_NhomB/public/error-system');
                }
            }
        });
    }
    function formatNumber(number) {
        let new_number = new Intl.NumberFormat({ style: 'currency'}).format(number)
        return new_number
    }
    $(function(){
        $(document).on('click','.cart-update',updateCart);
        $(document).on('click','.cart-delete',deleteCart);
    });
</script>
@endsection