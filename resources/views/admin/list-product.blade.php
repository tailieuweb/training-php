@extends('admin.shared.master')
@section('content')
@include('admin.shared.header')
@include('admin.shared.sidebar')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                List Product
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix" style="margin-bottom: 10px;">
                        <div class="btn-group">
                            <button id="editable-sample_new" class="btn green">
                                <a href="{{ route('getAddProduct') }}">Add New <i class="fa fa-plus"></i></a>
                            </button>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Manufacture</th>
                            <th>Protype</th>
                            <th>Origin</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Promotion_price</th>
                            <th>Feature</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_product as $item)
                        <tr class="">
                            <td><img class="pro-img" src="{{ asset('images/' . $item->pro_image ) }}" alt=""></td>
                            <td class="center">{{ $item->name }}</td>
                            <td>{{ $manufacture->getManuNameById($item->manu_id)->manu_name }}</td>
                            <td>{{ $protype->getProtypeNameById($item->protype_id)->protype_name }}</td>
                            <td>{{ $item->origin }}</td>
                            <td>{{ substr($item->description, 0, 100) }}...</td>
                            <td>{{ number_format($item->price,0)  }}</td>
                            <td>{{ number_format($item->promotion_price,0)  }}</td>
                            <td class="center">{{ $item->feature }}</td>
                            <td><a class="" href="{{ route('getEditProduct', $item->id) }}">Edit</a></td>
                            <?php
                            $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                            $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                            $result = $string1 . base64_encode($item->id) . $string2;
                            ?>
                            <td><a class="delete" href="{{ route('getDeleteProduct', $result) }}">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12" style="text-align: center;">
                </div>       
            </div>
        </section>
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