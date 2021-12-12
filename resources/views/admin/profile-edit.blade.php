@extends('admin.shared.master')
@section('content')
@include('admin.shared.header')
@include('admin.shared.sidebar')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round">
                            <h1>{{ $person->full_name }}</h1>
                            <p style="text-align: center;">{{ $person->email }}</p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{ route('adminProfile') }}"><i class="fa fa-user"></i> Profile</a></li>
                            <li class="active"><a href="{{ route('adminEditProfile') }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                            <li><a href="{{ route('adminEditAccount') }}"> <i class="fa fa-edit"></i>Change account</a></li>
                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <h1> Profile Info</h1>
                            <form class="form-horizontal" role="form" method="post" action="{{ route('postAdminEditProfile') }}">
                                @csrf
                                <?php
                                $permitted_chars = '+-*/\=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                                $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                                $result = $string1 . base64_encode($person->id) . $string2;
                                ?>
                                <input type="hidden" class="form-control" id="id" name="id" value="{{ $result }}">
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Full name</label>
                                    <div class="col-lg-6">
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
                                    <div class="col-lg-6">
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
                                    <label  class="col-lg-2 control-label">Number phone</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $person->phone }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-6">
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
                    </section>
                </aside>
            </div>
            <!-- page end-->
        </section>
    </section>
    <footer class="site-footer">
        <div class="text-center">
            2013 &copy; FlatLab by VectorLab.
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
@endsection
