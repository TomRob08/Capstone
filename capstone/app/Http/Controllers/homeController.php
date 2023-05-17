<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $leaders = DB::table('total_score')->select('username', 'total')->orderBy('total', 'desc')->limit(10)->get();

        return view('home.home')->with('leaders', $leaders);
    }
}
