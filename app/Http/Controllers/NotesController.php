<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function index(){
      $notes = Notes::all();
      $pages = Page::all();

      return view('video-view', ['notes'=> $notes, 'pages' => $pages]);
    }

   public function save(Request $request)
    {
      $notes = new Notes();
      $notes->notes_desc = $request->input('notes_desc');
      $notes->lesson_title = $request->input('lesson_title');
      $notes->user_id = $request->user()->id;
      $notes->save();
      Session::put('video-view_url', request()->fullUrl());
      return redirect(session('video-view_url'));
    } 

    public function update(Request $request, $notes_id)
    {
      dd(Notes::select('notes_desc', 'lesson_title')->where('notes_id',$notes_id)->first());
      
    } 

    public function delete($notes_id)
    {
      return Notes::find($notes_id);
      /**try{
        $notes = Notes::find($notes_id);
      } catch (ModelNotFoundException $e){
        Session::put('video-view_url', request()->fullUrl());
        return redirect(session('video-view_url'))->with(['message', 'Failed']);
      }
      
      $notes->delete();
     
      Session::put('video-view_url', request()->fullUrl());
      return redirect(session('video-view_url'))->with(['message', 'Success']); **/
    }
    

}
