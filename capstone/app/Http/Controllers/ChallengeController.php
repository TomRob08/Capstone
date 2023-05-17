<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $challenges = $this->getChallenges();
        $completed = $this->getCompleted();

        return view('challenges.challenge')->with(compact('challenges', 'completed'));
    }

    private function getChallenges()
    {
        return DB::table('ctf_challenges')->select("*")->orderBy('score', 'asc')->get();
    }

    private function getCompleted()
    {
        return DB::table('completion')->select("id", "name")->get();
    }

    public function check(Request $request)
    {
        $this->validate($request, [
            'answer' => 'regex:/[a-zA-Z0-9\s]+/',
            'name' => 'regex:/[a-zA-Z0-9\s]+/'
        ]);

        $isCorrect = $this->checkAnswer($request->answer, $request->name);

        return redirect()->route('challenge')->with('$isCorrect', $isCorrect);
    }

    private function checkAnswer($userAnswer, $name)
    {
        $answer = DB::table('ctf_challenges')->select("answer", "score")->where('name', '=', $name)->get();

        if ($answer[0]->answer == $userAnswer)
        {
            if (!$this->completeExists(auth()->user()->id, $name))
            {
                DB::table('completion')->insert([
                    'id' => auth()->user()->id,
                    'name' => $name,
                    'complete' => true,
                    'score' => $answer[0]->score,
                    'created_at' => now(),
                    'updated_at' => now()
            ]);
            }
            return true;
        }

        else
        {
            return false;
        }
    }

    private function completeExists($id, $name)
    {
        return DB::table('completion')->select("name")->where([
            ['name', '=', $name],
            ['id', '=', $id],
        ])->exists();
    }
}
