@extends('admin.shared.master')
@include('admin.shared.header')
@include('admin.shared.sidebar')
@section('content')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <aside class="profile-info col-lg-12">
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <form class="form-horizontal" role="form" method="post" action="{{ route('postAddAmin') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h1> Account</h1>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Username</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="user_name" name="user_name" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Password</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="password" name="password" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Confrim Password</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="repassword" name="repassword" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h1> Profile</h1>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Full name</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Gender</label>
                                            <div class="col-lg-8 gender-container" style="margin-top: 6px; display: flex;">
                                                <div style="margin-right: 25px;">
                                                    <input type="radio" id="male" name="gender" value="1" required>
                                                    <label>Male</label>
                                                </div>
                                                <div>
                                                    <input type="radio" id="female" name="gender" value="0" required>
                                                    <label>Female</label>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Address</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="address" name="address" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Birthday</label>
                                            <div class="col-lg-8">
                                                <input class="col-md-7 form-control" id="date" type="date" name="date" min="1920-01-01" max="2015-12-31" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Number phone</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="phone" name="phone" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" id="email" name="email" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label  class="col-lg-2 control-label">Role</label>
                                            <div class="col-lg-3">
                                                <select class="role" name="role" style="width: 100%; padding: 8px; border: 1px solid #e2e2e4; border-radius: 4px;" required>
                                                    <option value="manager">Manager</option>
                                                    <option value="editer">Editer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" class="btn btn-success">Save</button>
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
