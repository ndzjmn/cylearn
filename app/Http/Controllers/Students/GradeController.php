<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Quiz;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index()
    {
        $results = Result::all();
        $quiz = Quiz::all();
        return view('student.grading.index', ['results' => $results, 'quizzes' => $quiz]);
    }

}
