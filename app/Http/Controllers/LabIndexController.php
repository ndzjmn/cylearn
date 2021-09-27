<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Laboratory;

class LabIndexController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $questions = Question::all();
        $quizzes = Quiz::all();
        return view('lab-view', [
            'pages' => $pages,
            'questions' => $questions,
            'quizzes' => $quizzes,]);
    }

    public function labcontents()
    {
        $pages = Page::all();
        return view('laboratory-contents', ['pages' => $pages]);
    }
}
