<?php

namespace App\Http\Controllers\challenges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pcapController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('challenges.pcap.pcap');
    }
}
