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
                            <form class="form-horizontal" role="form" method="post" action="{{ route('postAddProduct') }}" enctype="multipart/form-data">
                                @csrf
                                <h1> Add Product</h1>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="name" name="name" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Manufacture</label>
                                    <div class="col-lg-2">
                                        <select class="manufacture" name="manufacture" style="width: 100%; padding: 8px; border: 1px solid #e2e2e4; border-radius: 4px;" required>
                                            @foreach($manu as $item)
                                            <option value="{{ $item->id }}">{{ $item->manu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Protype</label>
                                    <div class="col-lg-2">
                                        <select class="protype" name="protype" style="width: 100%; padding: 8px; border: 1px solid #e2e2e4; border-radius: 4px;" required>
                                            @foreach($pr_type as $item)
                                            <option value="{{ $item->id }}">{{ $item->protype_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Origin</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="origin" name="origin" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Image</label>
                                    <div class="col-lg-4">
                                        <input type="file" id="pro_image" name="pro_image" accept="image/*" required/>
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Price</label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="price" name="price" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Promotion Price</label>
                                    <div class="col-lg-4">
                                        <input class="col-md-7 form-control" id="promotionPrice" type="text" name="promotionPrice" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Description</label>
                                    <div class="col-lg-8">
                                        <textarea type="text" class="form-control" id="description" name="description" value=""></textarea required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Feature</label>
                                    <div class="col-lg-2">
                                        <input type="number" class="form-control" min="0" max="1" id="feature" name="feature" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Size</label>
                                    <div class="col-lg-3">
                                        <select multiple class="role" name="size[]" style="width: 100%; height: 150px; padding: 8px; border: 1px solid #e2e2e4; border-radius: 4px;" required>
                                            @foreach($list_size as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
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
