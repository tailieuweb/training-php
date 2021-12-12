@extends('admin.shared.master')
@include('admin.shared.header')
@include('admin.shared.sidebar')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                List Customer
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($account as $key => $item)
                        <tr class="">
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $person->getPersonByAccountId($item->id)->full_name }}</td>
                            <td>{{ $person->getPersonByAccountId($item->id)->gender }}</td>
                            <td>{{ $person->getPersonByAccountId($item->id)->address }}</td>
                            <td>{{ $person->getPersonByAccountId($item->id)->phone }}</td>
                            <td>{{ $person->getPersonByAccountId($item->id)->email }}</td>
                            <td class="center">
                                <?php
                                    $person_id = $person->getPersonByAccountId($item->id)->id;
                                    $permitted_chars = '+-=0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $string1 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $string2 = substr(str_shuffle($permitted_chars), 0, 36);
                                    $result = $string1 . base64_encode($customer->getCustomerByPersonId($person_id)->id) . $string2;
                                ?>
                                <select class="type-customer" name="type-customer" style="width: 100%;" data-id="{{ $result }}">
                                    <option style="text-align:center;" value="normal" {{ ($customer->getCustomerByPersonId($person_id)->type == 'normal') ? 'selected' : '' }}>Normal</option>
                                    <option style="text-align:center;" value="vip" {{ ($customer->getCustomerByPersonId($person_id)->type == 'vip') ? 'selected' : '' }}>Vip</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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