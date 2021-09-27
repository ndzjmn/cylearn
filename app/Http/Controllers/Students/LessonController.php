<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
class LessonController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return view('student.lessons.index', ['quizzes' => $quizzes]);
    }

}
