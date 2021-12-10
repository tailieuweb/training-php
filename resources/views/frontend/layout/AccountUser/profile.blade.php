@extends('frontend.index-header-profile')
@section('content')

<!-- information user -->
<div class="container">
    <div class="main-body">
        <!-- header inner -->
        <!-- gộp thằng header vào trong profile -->
        @include('frontend.partial.header')
        <!-- information user -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                        
                            <!-- image user -->
                            @if($users_web->image_profile??null)
                                <img src="{{asset('frontend/images/profiles/')}}/{{$users_web->image_profile}}" alt="Admin" class="rounded-circle" width="50%">
                            @else
                                <img src="{{asset('frontend/images/profiles/user1.jpg')}}" alt="Admin" class="rounded-circle" width="50%">
                            @endif
                            <div class="mt-3">
                                <!-- gán giá trị biên vừa tạo bên controller -> dẫn tới cột tương ứng của user_web -->
                                <h4>{{$users_web->username}}</h4>
                                <!-- còn nếu ở bảng profile thì phải trỏ thêm qua model bảng profile_users -->
                                <!-- và giá trị nào ko tồn tại thì mình đặt '??null' để báo kiểm tra hiện thị -->
                                <p class="text-secondary mb-1">{{$users_web->phone}}</p>
                                <p class="text-muted font-size-sm">{{$users_web->address}}</p>
                                <!-- <button class="btn btn-primary">Follow</button> -->
                                <button class="btn btn-outline-primary"
                                    style="background-color: #FF9900; color: #fff;">
                                    <a href="{{asset('/')}}"style="text-decoration: none; color:#fff;">Home</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$users_web->fullName}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$users_web->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$users_web->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date Of Birth</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$users_web->Date}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$users_web->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">

                            <!-- tao lien ket voi edit user -->
                                <a class="btn btn-info " target="_self" href="{{asset('')}}editProfile/{{$users_web->id}}">Edit</a>
                              
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- COUPONS DISCOUNT -->
<div class="container">
    <section id="labels">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="dl">
                    <div class="brand">
                        <h2>NEW USER</h2>
                    </div>
                    <div class="discount alizarin">15%
                        <div class="type">off</div>
                    </div>
                    <div class="descr">
                        <strong>Welcome new customers*.</strong>
                        <strong>12/10/2021 - 23/10/2021</strong>
                        <p>Apply for the first time using the service</p>
                    </div>
                    <div class="ends">
                        <small>* Conditions and restrictions apply.</small>
                    </div>
                    <div class="coupon midnight-blue">
                        <a data-toggle="collapse" href="#code-1" class="open-code">Get a code</a>
                        <div id="code-1" class="collapse code">LV5MAY14</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="dl">
                    <div class="brand">
                        <h2>HOTEL</h2>
                    </div>
                    <div class="discount emerald">
                        50%
                        <div class="type">
                            off
                        </div>
                    </div>
                    <div class="descr">
                        <strong>
                            Lorem ipsum dolor sit amet.
                        </strong>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, at?
                    </div>
                    <div class="ends">
                        <small>
                            Lorem ipsum dolor sit amet*.
                        </small>
                    </div>
                    <div class="coupon midnight-blue">
                        <a data-toggle="collapse" href="#code-2" class="open-code">Get a code</a>
                        <div id="code-2" class="collapse in code">
                            HOTEL111
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="dl">
                    <div class="brand">
                        <h2>
                            HOTEL
                        </h2>
                    </div>
                    <div class="discount peter-river">
                        15%
                        <div class="type">
                            off
                        </div>
                    </div>
                    <div class="descr">
                        <strong>
                            Lorem ipsum dolor sit amet.*.
                        </strong>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, sequi.
                    </div>
                    <div class="ends">
                        <small>
                            * Lorem ipsum dolor sit amet..
                        </small>
                    </div>
                    <div class="coupon midnight-blue">
                        <a data-toggle="collapse" href="#code-3" class="open-code">Get a code</a>
                        <div id="code-3" class="collapse code">
                            QWERRE
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="dl">
                    <div class="brand">
                        <h2>
                            HOTEL SAMSON
                        </h2>
                    </div>
                    <div class="discount amethyst">
                        25%
                        <div class="type">
                            off
                        </div>
                    </div>
                    <div class="descr">
                        <strong>
                            Lorem ipsum dolor sit amet.*.
                        </strong>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae, minus..
                    </div>
                    <div class="ends">
                        <small>
                            * Lorem ipsum dolor sit amet..
                        </small>
                    </div>
                    <div class="coupon midnight-blue">
                        <a data-toggle="collapse" href="#code-4" class="open-code">Get a code</a>
                        <div id="code-4" class="collapse code">
                            12AAAA
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>
</div>
@endsection