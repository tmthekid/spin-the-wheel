@extends('layout')

<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div style="background: rgba(255, 255, 255, .7); padding: 3rem; border-radius: 1rem;">
        @if(request()->session()->get('code') && request()->session()->get('value'))
            <div class="text-3xl">Voucher Code: 
                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded">
                    {{ request()->session()->get('code') }}
                </span>
            </div>
            <div class="text-3xl mt-6">Voucher Value: {{ request()->session()->get('value') }}</div>
            <a href="/pdf?code={{ request()->session()->get('code') }}" target="__blank" class="px-4 py-2 mt-8 rounded-md bg-blue-700 text-sm text-white" type="submit">Print</a>
        @else
            <script>window.location = "/";</script> 
        @endif
    </div>
</div>