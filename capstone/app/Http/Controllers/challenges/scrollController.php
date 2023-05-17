<?php

namespace App\Http\Controllers\challenges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class scrollController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $header = $request->headers;
        $userAgent = $header->all('user-agent')[0];
        $mozilla = strpos($userAgent, "ozilla/5.0");
        $instagram = strpos($userAgent, "Instagram");
        $android = strpos($userAgent, "Android");
        $windows = strpos($userAgent, "Windows");
        $tesla = strpos($userAgent, "Tesla");

        if  ($mozilla != false && $instagram != false && $android != false)
        {
            return view('challenges.agent.second');
        }

        elseif ($mozilla != false && $windows != false && $tesla != false)
        {
            return view('challenges.agent.flag');
        }

        else
            return view('challenges.agent.first');
    }
}

?>
