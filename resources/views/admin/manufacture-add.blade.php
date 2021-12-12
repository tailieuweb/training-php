@extends('admin.shared.master')
@section('content')
@include('admin.shared.header')
@include('admin.shared.sidebar')
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <div class="panel-body bio-graph-info">
                        <form class="form-horizontal" role="form" method="post" action="{{ route('postAddManufacture') }}" enctype="multipart/form-data">
                            @csrf
                            <h1> Add Manufacture</h1>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Manufacture Name</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="manu_name" name="manu_name" value="">
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
