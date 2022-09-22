<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestQuestion;

class Test extends Controller
{
    public function test()
    {
        $questionList = TestQuestion::with('options')->get();
        return view('test', compact('questionList'));
    }
}
