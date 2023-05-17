<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class addChallengeController extends Controller
{
    public function checkadd()
    {
        if(Gate::allows('adminOnly', Auth::user()))
        {
            return view('updateChallenge.add');
        }
        return abort(404);
    }

    public function checkdel()
    {
        if(Gate::allows('adminOnly', Auth::user()))
        {
            return view('updateChallenge.del');
        }
        return abort(404);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'answer' => 'required',
            'URL' => 'url',
            'desc' => 'required',
        ]);

        DB::table('ctf_challenges')->insert([
            'name' => $request->name,
            'answer' => $request->answer,
            'URL' => $request->url,
            'description' => $request->desc,
            'score'=> $request->score
        ]);

        return redirect()->route('add');
    }

    public function del(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        DB::table('ctf_challenges')->where('name', '=', $request->name)->delete();

        return redirect()->route('delete');
    }
}
?>
