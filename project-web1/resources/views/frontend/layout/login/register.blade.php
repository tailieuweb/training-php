@extends('frontend.index-login')
@section('content')

<div class="content-w3ls">
            <div class="text-center icon"><br>
                <!-- <img src="./images/bia.jpg" class="img-fluid" alt="logo"> -->
                <div class="logo">
                    <h1> <a style="color: white; font-size: 25px;"><span class=""></span>REGISTER</a></h1>
                </div>
            </div>
            <!---728x90--->
            <div class="content-bottom">
                <form action="{{route('frontend.register.index')}}" method="post">
                    @csrf
                    <div class="field-group">
                        <span ></span>
                        <div class="wthree-field">
                            <input name="username" id="text1" type="text" value="" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="field-group">
                        <span ></span>
                        <div class="wthree-field">
                            <input name="email" id="myInput" type="Email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field-group">
                        <span ></span>
                        <div class="wthree-field">
                            <input name="password" id="myInput" type="Password" placeholder="Password">
                        </div>
                    </div>
                    <div class="field-group">
                        <span ></span>
                        <div class="wthree-field">
                            <input name="password" id="myInput" type="Password" placeholder="Confirm Password">
                        </div>
                    </div>
                   
                    <div class="form-check">
                        <input type="checkbox"> <span style="color: white;">I have read and agree to the terms of</span>
                    </div>
                    <div class="wthree-field">
                        <button type="submit" class="btn">Create Account</button>
                    </div>
                    <ul class="list-login">
                        <li class="switch-agileits">
                            <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                        keep Logged in
                    </label>
                        </li>
                        <li>
                            <a href="#" class="text-right">forgot password?</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul>
                    <!-- <ul class="list-login-bottom">
                        <li class="">
                            <a href="#" class="">Create Account</a>
                        </li>
                        <li class="">
                            <a href="#" class="text-right">Need Help?</a>
                        </li>
                        <li class="clearfix"></li>
                    </ul> -->
                </form>
            </div>
        </div>
        @endsection