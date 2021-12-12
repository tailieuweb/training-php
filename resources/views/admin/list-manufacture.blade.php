@extends('admin.shared.master')
@section('content')
@include('admin.shared.header')
@include('admin.shared.sidebar')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                List Manufacture
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix" style="margin-bottom: 10px;">
                        <div class="btn-group">
                            <button id="editable-sample_new" class="btn green">
                                <a href="{{ route('getAddManufacture') }}">Add New <i class="fa fa-plus"></i></a>
                            </button>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_manu as $item)
                        <tr class="">
                            <td class="center">{{ $item->manu_name }}</td>
                            <td><a class="" href="{{ route('getEditManufacture', $item->id) }}">Edit</a></td>
                            <?php
                            $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                            $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                            $result = $string1 . base64_encode($item->id) . $string2;
                            ?>
                            <td><a class="delete" href="{{ route('getDeleteManufacture', $result) }}">Delete</a></td>
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