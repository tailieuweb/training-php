@extends('admin.shared.master')
@section('content')
    <form method="POST" class="form-signin" action="{{ route('postLoginAdmin') }}">
    @csrf
    <h2 class="form-signin-heading">sign in now</h2>
    <div class="login-wrap">
        <input name="username" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>     
    </div>
    </form>
@endsection
