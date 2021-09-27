<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Quiz;
use Illuminate\Support\Facades\DB;
use App\Models\Notes;

class VideoController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $pages = Page::all();
        return view('livewire.videos', ['pages' => $pages, 'quiz' => $quizzes]);
    }
}
