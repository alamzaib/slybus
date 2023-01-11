<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TextTemplateController;
use App\Http\Controllers\ImageTemplateController;
use App\Http\Controllers\VideoTemplateController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('school', SchoolController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('subject', SubjectController::class);
Route::resource('course', CourseController::class);
Route::resource('unit', UnitController::class);
Route::resource('topic', TopicController::class);
Route::resource('syllabus', SyllabusController::class);
Route::resource('lesson', LessonController::class);
Route::resource('content', ContentController::class);
Route::resource('text', TextController::class);
Route::resource('image', ImageController::class);
Route::resource('video', VideoController::class);
Route::resource('texttemplate', TextTemplateController::class);
Route::resource('imagetemplate', ImageTemplateController::class);
Route::resource('videotemplate', VideoTemplateController::class);

