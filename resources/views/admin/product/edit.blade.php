@extends('layouts.manage')

@section('content')

<div class="container">
    <h1>Sửa Sản phẩm</h1>

    <form action="{{route('product.update', $item->id)}}" method="POST" >
        @csrf
         @method('PATCH') 
        <div class="form-group">
            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Tên sản phẩm" value="{{ $item->product_name }}">
        </div>
        <div class="form-group">
            <input type="text" name="price" id="price" class="form-control" placeholder="Giá" value="{{ $item->price }}">
        </div>
        <div class="form-group">
            <textarea type="text" name="description" id="description" class="form-control" placeholder="Mô tả">{{ $item->description }}</textarea>
        </div>
        <div class="form-group">
            <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng" value="{{ $item->quantity }}">
        </div>
        <!-- <div class="form-group">
            <input type="text" name="pro_image" id="pro_image" class="form-control" placeholder="Product Image" value="{{ $item->pro_image }}">
        </div> -->
      
        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Cập nhật</button>
    </form>
</div>

@endsection


