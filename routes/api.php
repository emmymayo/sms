<?php

use App\Http\Controllers\ClassApiController;
use App\Http\Controllers\ExamRegistrationApiController;
use App\Http\Controllers\ExamReportEntryApiController;
use App\Http\Controllers\SectionApiController;
use App\Http\Controllers\StudentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/classes',[ClassApiController::class,'index']); 
Route::get('/sections/classes/{classes_id}',[SectionApiController::class,'classIndex']);
Route::get('/students/section/{section_id}',[StudentApiController::class,'sectionIndex']);
Route::get('/students/{student}',[StudentApiController::class,'show']);
Route::get('/exam-registration/subjects',[ExamRegistrationApiController::class,'SubjectIndex']);
Route::get('/exam-registration/active-exam',[ExamRegistrationApiController::class,'activeExam']);
Route::get('/exam-registration/student/{student_id}/section/{section_id}/registered',
        [ExamRegistrationApiController::class,'studentRegisteredSubjects']);
Route::post('/exam-registration',[ExamRegistrationApiController::class,'store']);
//exam report entry 
Route::get('/exam-entry/section/{section_id}/subject/{subject_id}', 
        [ExamReportEntryApiController::class,'sectionSubjectEntries']);
Route::get('/exam-entry/subjects', 
        [ExamReportEntryApiController::class,'subjectIndex']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

