@extends('admin.shared.master')
@include('admin.shared.header')
@include('admin.shared.sidebar')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                List Order
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order time</th>
                            <th>Grand price</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $key => $item)
                        <tr class="">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ number_format($item->grand_price,0) }}</td>
                            <td>{{ ($item->note == '') ? 'Empty' : $item->note }}</td>
                            <td>
                                <?php
                                    if($item->status == 'progress') {
                                        $color = 'warning';
                                    } else if($item->status == 'delivery') {
                                        $color = 'info';
                                    } else if($item->status == 'cancel') {
                                        $color = 'danger';
                                    } else {
                                        $color = 'success';
                                    }
                                ?>
                                <div class="btn btn-{{ $color }}">{{ $item->status }}</div>
                            </td>
                            <td class="eye-detail" style="text-align:center;"><a href="{{ route('getOrderDetail', $item->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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