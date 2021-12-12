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
            <div class="col-lg-5 col-sm-12">
                <div class="contact-info-left">
                    <!-- xuat thong tin khach hang -->
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
                <a href="{{ route('getCustomerEditPassword') }}" class="btn hvr-hover" style="margin-top:20px;">Change Password</a>
            </div>
            <div class="col-lg-7 col-sm-12">
            <h1> Edit Profile</h1>
                <form class="form-horizontal" role="form" method="post" action="{{ route('postCustomerEditProfile') }}">
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $person->id }}">
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Full name</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $person->full_name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-6 gender-container" style="margin-top: 6px; display: flex;">
                            <div style="margin-right: 25px;">
                                <input type="radio" id="male" name="gender" value="1" {{ $person->gender == 'Male' ? 'checked' : '' }} style="margin-right: 5px;" required>
                                <label>Male</label>
                            </div>
                            <div>
                                <input type="radio" id="female" name="gender" value="0" {{ $person->gender == 'Female' ? 'checked' : '' }} style="margin-right: 5px;" required>
                                <label>Female</label>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-12">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $person->address }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Birthday</label>
                        <div class="col-lg-6">
                            <input class="col-md-7 form-control" id="date" type="date" name="date" min="1920-01-01" max="2015-12-31" value="{{ $person->date_of_birth }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-3 control-label">Number phone</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $person->phone }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="email" name="email" value="{{ $person->email }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>
@endsection
    