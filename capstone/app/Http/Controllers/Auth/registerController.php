<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('register.reg');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|between:5,25|unique:ctf_users|alpha_num',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([ 
            'username'=>$request->username, 
            'password'=>Hash::make($request->password),
        ]);

        Auth::attempt($request->only('username', 'password'), $request->remember);

        return redirect()->route('challenge');
    }
}?>
