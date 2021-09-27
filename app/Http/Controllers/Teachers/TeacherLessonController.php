<?php

namespace App\Http\Controllers\Teachers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class TeacherLessonController extends Controller
{
    public function index()
    {
        return view('teacher.lessons.index');
    }
}
