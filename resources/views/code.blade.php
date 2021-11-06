@extends('layout')

<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    @if($code = request()->session()->get('code'))
        <h1 class="text-5xl">{{ $code }}</h1>
        {{ request()->session()->forget('code') }}
    @else
        <script>window.location = "/";</script> 
    @endif
</div>