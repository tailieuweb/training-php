@extends('frontend.index-header-editProfile')
@section('content')

<div class="container">
    <div class="main-body">
        <!-- header inner -->
        @include('frontend.partial.header')
        <!-- end header inner -->
        <!-- Change Information User -->
        <div class="row edit-change-sm">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                class="rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <!-- <h4>Van Anh</h4>
									<p class="text-secondary mb-1">0987654321</p>
									<p class="text-muted font-size-sm">Quan 9, Thanh pho Ho Chi Minh</p> -->
                                <br>
                                <marquee style="color:#FF9999; font-size:25px;font-weight: bold;">Felicity Hotel - Best
                                    Service, Right Time, Right People</marquee>
                                <hr>
                                <button class="btn btn-outline-primary" style="background-color:#FF9900; color: #fff;">
                                    <a href="{{asset('/')}}" style="text-decoration: none; color:#fff;">Home</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <!-- form update profile user -->
                    <form action="{{asset('')}}updateProfile/{{$users_web->id}}">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="name"
                                        value="{{$users_web->username}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="fullname"
                                        value="{{$users_web->profile->fullName}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$users_web->email}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="phone"
                                        value="{{$users_web->profile->phone}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date Of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="Date"
                                        value="{{$users_web->profile->Date}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="address"
                                        value="{{$users_web->profile->address}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End change User -->
    </div>
</div>
<!-- carousel-slider -->
<div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner row w-100 mx-auto">
            <div class="carousel-item col-md-4 active">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h4 class="card-title">Card 1</h4>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis impedit,
                            ratione numquam obcaecati dignissimos quis!</p>
                        <p class="card-text">
                            <a href="#" class="btn btn-primary">See</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h4 class="card-title">Card 2</h4>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <p class="card-text">
                            <a href="#" class="btn btn-primary">See</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h5 class="card-title">Card title3</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <a href="#" class="btn btn-primary">See</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h5 class="card-title">Card title4</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <a href="#" class="btn btn-primary">See</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h5 class="card-title">Card title5</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <a href="#" class="btn btn-primary">See</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h5 class="card-title">Card title6</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <a href="#" class="btn btn-primary">See</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('img/hotel/presstai-xuong-1png-1634192298.png')}}"
                        alt="Card image cap" width="50%">
                    <div class="card-body">
                        <h5 class="card-title">Card title7</h5>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, illum
                            voluptatibus atque explicabo nostrum earum!</p>
                        <a href="#" class="btn btn-primary">See</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
                        <i class="fa fa-lg fa-chevron-left"></i>
                    </a>
                    <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
                        <i class="fa fa-lg fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection