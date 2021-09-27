<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PDFModuleController extends Controller
{
    public function viewPDF()
    {
        $pages = Page::all();
        return view('pdfmodule-view', ['pages' => $pages]);
    }
}
