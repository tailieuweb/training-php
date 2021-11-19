@extends('layouts.manage')

@section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm mới
                            <small>Sản phẩm</small>
                        </h1>
                    </div>
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Tên sản phẩm...">
        </div>
        <div class="form-group">
            <input type="text" name="price" id="price" class="form-control" placeholder="Giá...">
        </div>
        <div class="form-group">
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng...">
        </div>
        <div class="form-group">
            <textarea type="text" name="description" id="description" class="form-control" placeholder="Mô tả..."></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="product_image" id="product_image" class="form-control" placeholder="Hình ảnh">
        </div>
        <div class="form-group">
            @foreach ($categories as $category)
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="category_id[]" id="category_id" value="{{ $category->id }}" >
                {{ $category->name }}
              </label>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> Thêm</button>
    </form>
</div>
@endsection