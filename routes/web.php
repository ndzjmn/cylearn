<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\FrontendController@index');
Route::get('/about-us', 'App\Http\Controllers\FrontendController@aboutus');
Route::get('/contact-us', 'App\Http\Controllers\FrontendController@contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function() {
        Route::resource('lessons', App\Http\Controllers\Students\LessonController::class);
        Route::resource('grading', App\Http\Controllers\Students\GradeController::class);
    });
   Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function() {
    Route::resource('courses', App\Http\Controllers\Teachers\CourseController::class);
    Route::resource('lessons', App\Http\Controllers\Teachers\TeacherLessonController::class);
    Route::resource('grading', App\Http\Controllers\Teachers\GradebookController::class);
   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    });
});
Route::get('/lab-view/{urlslug}', 'App\Http\Controllers\LabIndexController@index');
Route::get('/laboratory-contents/{urlslug}', 'App\Http\Controllers\LabIndexController@labcontents');

Route::get('video-view/{urlslug}', 'App\Http\Controllers\NotesController@index');
Route::post('video-view/{urlslug}', 'App\Http\Controllers\NotesController@save');
Route::post('video-view/{urlslug}/edit/{notes_id}', 'App\Http\Controllers\NotesController@update');
Route::get('video-view/{urlslug}/delete/{notes_id}', 'App\Http\Controllers\NotesController@delete');

Route::get('/pdfmodule-view/{urlslug}', 'App\Http\Controllers\PDFModuleController@viewPDF');

Route::get('/download', function(){
    $file = public_path()."/ec2-18-191-148-230.us-east-2.compute.amazonaws.com.rdp";

    $headers = array(
        'Content-Type: application/rdp',
    );

    return Response::download($file, "virtual_machine.rdp", $headers);
});

Route::get('/lessons/{urlslug}', App\Http\Livewire\Frontpage::class);

Route::get('/file-upload', [App\Http\Controllers\FileUpload::class, 'createForm']);

Route::post('/file-upload', [App\Http\Controllers\FileUpload::class, 'fileUpload'])->name('fileUpload');


Route::group(['middleware' => ['auth', 'TeacherCheck'], 'prefix' => 'teacher',], function () {
    /* Quiz Route */
    Route::get('quizzes/{id}', [App\Http\Controllers\Teachers\QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quizzes/{id}/detail', [App\Http\Controllers\Teachers\QuizController::class, 'show'])->whereNumber('id')->name('quizzes.detail');
    Route::resource('quizzes', App\Http\Controllers\Teachers\QuizController::class);

    /* Question Route */
    Route::get('quiz/{quiz_id}/questions/{id}', [App\Http\Controllers\Teachers\QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}', [App\Http\Controllers\Teachers\QuestionController::class, 'deleteImage'])->whereNumber('id')->name('questions.deleteImage');
    Route::resource('quiz/{quiz_id}/questions', App\Http\Controllers\Teachers\QuestionController::class)->whereNumber('quiz_id');
});


Route::group(['middleware' => ['auth', 'StudentCheck'], 'prefix' => 'student',], function () {
    /* Quiz Answering Route */
    //Route::get('quizzes', [App\Http\Controllers\Students\MainQuizController::class, 'quizzes'])->name('quizzes');
    Route::get('quizzes/{slug}', [App\Http\Controllers\Students\MainQuizController::class, 'quizzesLesson'])->name('quizzes');
    Route::get('quiz/detail/{slug}', [App\Http\Controllers\Students\MainQuizController::class, 'quizDetail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [App\Http\Controllers\Students\MainQuizController::class, 'quizJoin'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [App\Http\Controllers\Students\MainQuizController::class, 'quizResult'])->name('quiz.result');
});
