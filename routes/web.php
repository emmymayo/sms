<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentSectionSessionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamRegistrationController;
use App\Http\Controllers\ExamReportEntryController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Models\Setting;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Section;



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
    return view('home');
})->name('home');

//Authentication Routes
Route::get('/login', function (){
    return view('login',[
                'schools' => Config::get('settings.schools'), 
                ]);
})->middleware('guest')->name('login');

Route::post('/login',[LoginController::class,'login']);
Route::any('/logout',[LoginController::class, 'logout'])->middleware('auth');
Route::get('/dashboard',[UserDashboardController::class,'toUserDashboard'])->middleware('auth');

Route::any('/test', function(){
    return view('home');
});

//Admin Routes
Route::resource('admins', AdminController::class)->middleware('auth');

//Teacher Routes
Route::resource('teachers', TeacherController::class)->middleware('auth');

//Student  Routes
Route::resource('students', StudentController::class)->middleware('auth');
Route::post('/students/{student}/set-class',[StudentController::class,'setClass'])->middleware('auth');

//User Routes
Route::post('/users/{user}/upload-photo',[UserController::class,'uploadPhoto'])->middleware('auth');
Route::get('/users/{user}/reset-password',[UserController::class,'resetPassword'])->middleware('auth');
Route::get('/users/{user}/toggle-status',[UserController::class,'toggleStatus'])->middleware('auth');
Route::patch('/users/{user}/change-password',[UserController::class,'changePassword'])->middleware('auth');

//Classes Routes
Route::get('/classes',[ClassesController::class,'index'])->middleware('auth');
Route::post('/classes',[ClassesController::class,'store'])->middleware('auth');
Route::get('/classes/{classes}/edit',[ClassesController::class,'edit'])->middleware('auth');
Route::patch('/classes/{classes}',[ClassesController::class,'update'])->middleware('auth');
Route::delete('/classes/{classes}',[ClassesController::class,'destroy'])->middleware('auth');


//Sections Routes
Route::resource('sections', SectionController::class)->middleware('auth');


//Student Sections  Routes (Promotion)
Route::resource('studentsectionsessions', StudentSectionSessionController::class)->middleware('auth');

//Exams routes
Route::resource('exams', ExamController::class)->middleware('auth');
Route::get('/exams/{exam}/publish', [ExamController::class,'publish'])->middleware('auth');

//Exam Registration
Route::get('/exams-registration', [ExamRegistrationController::class,'index'])->middleware('auth');
Route::get('/exams-registration/register/{student_id}/{section_id}', [ExamRegistrationController::class,'register'])->middleware('auth');
Route::post('/exams-registration',[ExamRegistrationController::class,'store'])->middleware('auth');

//Exam report Entry
Route::get('/exams-entry', [ExamReportEntryController::class,'index'])->middleware('auth');


//Subjects  Routes
Route::resource('subjects', SubjectController::class)->middleware('auth');