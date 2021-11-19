@extends('layouts.manage')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
    <div class="row">
    
    <div class="col-lg-12">
    <h1 class="page-header">Danh sách
                            <small>Sản phẩm</small>
                        </h1>
    <div class="beta-subject-list">
    
    <div class="beta-subjects-detail">
    <form style="padding-right:40%;padding-top:2%;" class="form-inline my-2 my-lg-0" role="search" method="get" id="" action="{{route('product.search')}}">
            <input style="border-radius:5px;" type="text" value="" name="key" placeholder="Nhập từ khóa...">
            <button style="border-radius:5px;"  class="btn btn-success"type="submit" id="">Tìm kiếm</button>
</form>
   @if(empty(count($product)))
     <p class="pull-left">Không tìm thấy sản phẩm nào</p>
     @else
    <p style="padding-left:2%;"class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
    @endif
    <div class="clearfix"></div></div></div>
  
    </div>
                      <a style="margin-left:92%;margin-bottom:5%;" href="{{route('product.create')}}" class="btn btn-success">Thêm <i class="fas fa-plus"></i></a>
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                            <tr >
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;">Tên</th>
                                <th style="text-align:center;">Giá</th>
                                <th style="text-align:center;">Mô tả</th>
                                <th style="text-align:center;">Hình ảnh</th>
                                <th style="text-align:center;">Số lượng</th>
                                <th style="text-align:center;">Sửa</th>
                                <th style="text-align:center;">Xóa</th>
                            </tr>
                        </thead>
                        @foreach($product as $item)
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product_name }}</a></td>
                                <td>{{ $item->price }}</td>
                                <td>{{ mb_substr($item->description,0, 20).'...' }}</td>
                                <td><img height="50px" class="card-img-top" src="{{ asset('storage/images/' . $item->product_image) }}" alt="Card image cap"></td>
                                <td>{{ $item->quantity }}</td>
                                <td class="center"><a class="btn btn-primary" href="{{route('product.edit',$item->id)}}"><i class="fas fa-edit"></i></a></td>
                                <td class="center"><form action="{{route('product.destroy',$item->id)}}" method="POST" onsubmit="return confirm('Xóa sản phẩm?')">
                        @csrf
                         @method('DELETE') 
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
   
@endsection


