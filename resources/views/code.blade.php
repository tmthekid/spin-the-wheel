@extends('layout')

@section('content')
    @if($code = request()->session()->get('code'))
        <h1 class="text-5xl">{{ $code }}</h1>
        {{ request()->session()->forget('code') }}
    @else
        <script>window.location = "/";</script> 
    @endif
@endsection