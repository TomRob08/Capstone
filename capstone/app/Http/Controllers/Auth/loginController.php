<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('login.login');
    }

    public function log(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_num',
            'password' => 'required'
        ]);

        if(!(Auth::attempt($request->only('username', 'password'), $request->remember)))
        {
            return back()->with('status', 'Invalid login');
        }

        return redirect()->route('challenge');
    }
}
