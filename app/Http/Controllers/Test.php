<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestQuestion;
use Auth;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserTestResult;

class Test extends Controller
{
    public function test()
    {
        $questionList = TestQuestion::with('options')->get();
        $User = User::where('id', Auth::id())->first();
        $userExists = UserTestResult::where('user_id', Auth::id())->first();
        if($userExists == null) {
           $alreadyParticipated = 0;
        } else {
            $alreadyParticipated = 1;
        }
        return view('test', compact('questionList', 'User', 'alreadyParticipated'));
    }

    public function submitTest(Request $request)
    {
        \DB::transaction(function() use($request){
            foreach($request->question_id as $val => $no){
                UserAnswer::create([
                    "user_id"        => Auth::id(),
                    "question_id"    => $request->question_id[$val],
                    "option_id"      => json_encode($request->option_id[$val]),
                    "is_correct"     => $request->is_correct[$val],
                ]); 
            }

            $userTestDetails = UserAnswer::where('user_id', Auth::id())->get();
            $attempted       = $userTestDetails->whereNotNull('is_correct')->count();
            $correctAnswer   = $userTestDetails->where('is_correct', 1)->count();
            $wrongAnswer     = $attempted - $correctAnswer;
            $left            = 3 - $attempted;

            $totalScore = ($correctAnswer*(0.25) - $wrongAnswer*(.05));

            UserTestResult::create([
                "user_id"               => Auth::id(),
                "user_department_id"    => $request->department_id,
                "total_questions"       => 3,
                "attempted"             => $attempted,
                "correct_answer"        => $correctAnswer,
                "wrong_answer"          => $wrongAnswer,
                "total_score"           => $totalScore
            ]);
        });

        return redirect('/test-result/');
    }

    public function testResult(Request $request)
    {
        $filter = 0;
        if($request->search) {
            $filter = $request->search;
            $results = UserTestResult::with('users')->where('user_department_id', $filter)->orderBy('total_score', 'DESC')->get();
        } else {
            $results = UserTestResult::with('users')->orderBy('total_score', 'DESC')->get();
        }

        
        return view('testResult', compact('results', 'filter'));
    }
}
