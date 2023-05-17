<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $completed = DB::table('completion')
                ->selectRaw("sum(score) as score, date_format(created_at, '%m/%Y') as date")
                -> where('id', '=', Auth::user()->id)
                ->groupBy(DB::raw("date_format(created_at, '%m/%Y')"))
                ->get();

        $challenges = DB::table('completion')
                    ->select('name', 'score')
                    ->where('id', '=', Auth::user()->id)
                    ->get();

	if (count($challenges) > 0)
	{
        	$dates = $this->getDates($completed);
        	$dateRange = $this->getBetweenDates($dates[0], end($dates));
        	$points = $this->getPoints($dateRange, $completed);

        	return view('profile.profile1')->with(compact('dateRange', 'points', 'challenges'));
	}

	else
	{
		return view('profile.profile1')->with(compact('challenges'));
	}
    }

    private function getDates($completed)
    {
        $array = array();

        foreach ($completed as $c)
        {
            $array[] = $c->date;
        }

        return $array;
    }

    private function getPoints($dateRange, $completed)
    {
        $points = array();

        foreach ($dateRange as $d)
        {
            $inCompleted = false;
            foreach ($completed as $c)
            {
                if($c->date === $d)
                {
                    $inCompleted = true;
                    $points[] = (int)$c->score;
                }
            }
            
            if(!$inCompleted)
                $points[] = 0;
        }

        return $points;
    }

    private function getBetweenDates($start, $end)
    {
        $replacement = '28/';

        $startStr = substr_replace($start, $replacement, 3, 0);
        $endStr = substr_replace($end, $replacement, 3, 0);

        $startDate = strtotime($startStr);
        $endDate = strtotime($endStr);

        $months = array();
        
        for ($i = $startDate; $i <= $endDate; $i+=1.728e+6)
        {
            if(!(in_array(date("m/Y", $i), $months)))
                $months[] = date("m/Y", $i);
        }

        return $months;
    }

}
