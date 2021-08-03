<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentSectionSession;
use App\Support\Helpers\SchoolSetting;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function sectionIndex($section_id){
        $session_id = SchoolSetting::getSchoolSetting('current.session');
        $students = StudentSectionSession::select('students.*','users.name','users.avatar','students_sections_sessions.*')
                                ->where('section_id',$section_id)
                                ->where('session_id',$session_id)
                                ->join('students','students_sections_sessions.student_id','=','students.id')
                                ->join('users','students.user_id','=','users.id')
                                ->get();
        $students = $students->except(['password']);
        return response()->json($students,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return response()->json($student,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
