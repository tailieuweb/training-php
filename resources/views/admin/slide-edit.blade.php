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
                        <form class="form-horizontal" role="form" method="post" action="{{ route('postEditSlide') }}" enctype="multipart/form-data">
                            @csrf
                            <h1> Edit Slide</h1>
                            <?php
                            $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                            $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                            $result = $string1 . base64_encode($slide->id) . $string2;
                            ?>
                            <input type="hidden" name="slide_id" value="{{ $result }}">
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
