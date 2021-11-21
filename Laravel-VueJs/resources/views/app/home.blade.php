@extends('master')

@section('content')
    @if (session('statusTrue'))
        <div class="alert alert-success text-center">{{session('statusTrue')}}</div>
    @endif
    @if (session('statusFalse'))
        <div class="alert alert-danger text-center">{{session('statusFalse')}}</div>
    @endif
    <home-views></home-views>
@endsection
@section('title', 'Home | List View')
