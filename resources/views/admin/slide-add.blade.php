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
                        <form class="form-horizontal" role="form" method="post" action="{{ route('postAddSlide') }}" enctype="multipart/form-data">
                            @csrf
                            <h1> Add Slide</h1>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Image</label>
                                <div class="col-lg-4">
                                    <input type="file" id="slide_image" name="slide_image" accept="image/*"/>
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
