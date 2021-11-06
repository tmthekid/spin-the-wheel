<?php
namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Value;
use App\Models\Serial;

class AppController extends Controller
{
    public function index(){
        return view('index');
    }

    public function search(){
        request()->validate([
            'number' => 'required'
        ]);
        $serial = Serial::whereNumber(request()->number)->first();
        if(!$serial || !$serial->status) {
            return view('index', ['custom_error' => 'Wrong serial number, please try again']);
        }
        request()->session()->put('serial', $serial->id);
        return redirect()->route('get.client');
    }

    public function getClient(){
        if(!request()->session()->get('serial')){
            return redirect()->route('home');
        }
        return view('client');
    }

    public function saveClient(){
        request()->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        request()->session()->put('client_name', request()->full_name);
        request()->session()->put('client_email', request()->email);
        request()->session()->put('client_phone', request()->phone);
        return redirect()->route('get.distributor');
    }

    public function getDistributor(){
        if(!request()->session()->get('serial')){
            return redirect()->route('home');
        }
        if(!request()->session()->get('client_name')){
            return redirect()->route('get.client');
        }
        return view('distributor');
    }

    public function saveDistributor(){
        request()->validate([
            'full_name' => 'required',
            'phone' => 'required'
        ]);
        request()->session()->put('distributor_name', request()->full_name);
        request()->session()->put('distributor_phone', request()->phone);
        return redirect()->route('get.wheel');
    }

    public function getWheel(){
        if(!request()->session()->get('serial')){
            return redirect()->route('home');
        }
        if(!request()->session()->get('client_name')){
            return redirect()->route('get.client');
        }
        if(!request()->session()->get('distributor_name')){
            return redirect()->route('get.distributor');
        }
        return view('wheel');
    }

    public function saveWheel(){
        $serial = Serial::find(request()->session()->get('serial'));
        $value = Value::where('value', request()->value)->first();
        $code = $value->codes->where('status', true)->random();
        if($serial && $code->id) {
            $serial->update(['status' => false]);
            $serial->client()->create([
                'full_name' => request()->session()->get('client_name'),
                'email' => request()->session()->get('client_email'),
                'phone' => request()->session()->get('client_phone')
            ]);  
            $serial->distributor()->create([
                'full_name' => request()->session()->get('distributor_name'),
                'phone' => request()->session()->get('distributor_phone')
            ]);
            Code::where('id', $code->id)->update(['serial_id' => $serial->id, 'status' => false]);
            request()->session()->put('code', $code->code);
            request()->session()->forget('serial');
            request()->session()->forget('client_name');
            request()->session()->forget('client_email');
            request()->session()->forget('client_phone');
            request()->session()->forget('distributor_name');
            request()->session()->forget('distributor_phone');
            return response()->json(['data' => true]);
        } else {
            return response()->json(['data' => false]);
        }
    }

    public function getCode(){
        return view('code');
    }
}