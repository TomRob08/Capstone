<?php

namespace App\Http\Controllers\challenges;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sqlController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $query = (object)[];
        return view('challenges.sql.sqlInject')->with(compact('query'));
    }

    public function holocron(Request $request)
    {
        $query = DB::connection('mysql2')
            ->table('movies')
            ->selectRaw('year, description, rating')
            ->whereRaw("title = '$request->name'")
            ->get();

        return view('challenges.sql.sqlInject')->with(compact('query'));
    }
}
