<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\User;
use App\Http\Controllers\Controller;


class GradebookController extends Controller
{
    public function index()
    {
        $user = User::all();
        $results = Result::all();
        $quiz = Quiz::all();
        return view('teacher.grading.index', ['results' => $results, 'quizzes' => $quiz, 'users' => $user]);
    }
}
