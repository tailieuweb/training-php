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
            <div class="col-lg-12 col-sm-12">
            <h1>Edit Password</h1>
                <form class="form-horizontal" role="form" method="post" action="{{ route('postCustomerEditPassword') }}">
                    @csrf
                    <?php
                    $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $string5 = substr(str_shuffle($permitted_chars), 0, 36);
                    $string6 = substr(str_shuffle($permitted_chars), 0, 36);
                    $id = Auth::guard('account_customer')->user()->id;
                    $result3 = $string5 . base64_encode($id) . $string6;
                    ?>
                    <input type="hidden" name="id" value="{{ $result3 }}">
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Old Password</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">New Password</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Confrim Password</label>
                        <div class="col-lg-12">
                            <input type="password" class="form-control" id="repassword" name="repassword" required>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-lg-offset-12 col-lg-112" style="text-align:center;">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>
@endsection
    