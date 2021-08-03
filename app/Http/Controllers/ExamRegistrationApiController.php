<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Exam;
use App\Support\Helpers\SchoolSetting;

class ExamRegistrationApiController extends Controller
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

    public function subjectIndex(){

        return response()->json(Subject::all(), 200);
    }

    public function studentRegisteredSubjects($student_id, $section_id){
        
        $registered_subjects = Mark::where([
            'exam_id' => SchoolSetting::getSchoolSetting('active.exam'),
            'section_id' => $section_id,
            'student_id' => $student_id
        ])->get();
        //$registered_subjects = $registered_subjects->only(['subject_id']);
        return response()->json($registered_subjects, 200);
    }

    public function activeExam(){
        return response()->json(Exam::find(SchoolSetting::getSchoolSetting('active.exam')),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required',
            'student_id' => 'required',
            'section_id' => 'required',
        ]);
        $exam_id = SchoolSetting::getSchoolSetting('active.exam');

        if(Mark::where([
            'exam_id'=>$exam_id,
            'student_id'=>$request->input('student_id'),
            'section_id'=>$request->input('section_id'),
            'subject_id'=>$request->input('subject_id'),
            ])->count()>0)
        {
            $mark = Mark::where([
                    'exam_id'=>$exam_id,
                    'student_id'=>$request->input('student_id'),
                    'section_id'=>$request->input('section_id'),
                    'subject_id'=>$request->input('subject_id'),
                    ])->first();
            $is_deleted = $mark->delete();
            if($is_deleted){return response()->json(['message'=>'success','action'=>'Subject removed'], 201);}
            return response()->json(['message'=>'fail'], 200);
            

        }
        $mark = new Mark();
        $mark->exam_id = $exam_id;
        $mark->student_id = $request->input('student_id');
        $mark->section_id = $request->input('section_id');
        $mark->subject_id = $request->input('subject_id');
        $is_saved = $mark->save();
        if($is_saved){return response()->json(['message'=>'success','action'=>'Subject added'], 201);}
            return response()->json(['message'=>'fail'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
