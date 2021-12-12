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
                        <form class="form-horizontal" role="form" method="post" action="{{ route('postAddProtype') }}" enctype="multipart/form-data">
                            @csrf
                            <h1> Add Protype</h1>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="protype_name" name="protype_name" value="">
                                </div>
                            </div>   
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Type</label>
                                <div class="col-lg-2">
                                    <select class="type" name="type" style="width: 100%; padding: 8px; border: 1px solid #e2e2e4; border-radius: 4px;">
                                        @foreach($list_type as $item)
                                        <option value="{{ $item->type_id }}">{{ $item->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label">Image</label>
                                <div class="col-lg-4">
                                    <input type="file" id="image" name="image" accept="image/*"/>
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
