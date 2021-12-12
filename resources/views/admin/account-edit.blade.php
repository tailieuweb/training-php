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
                        <h1>Change Account Profile</h1>
                        <form class="form-horizontal" role="form" method="post" action="{{ route('postAdminEditAccount') }}">
                            @csrf
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Old password</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">New passord</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Confrim passord</label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" id="repassword" name="repassword" required>
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
