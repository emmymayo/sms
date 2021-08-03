<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Helpers\SchoolSetting;
use App\Models\Exam;

class ExamRegistrationController extends Controller
{
    
    public function index(){
        return view('pages.exams.registration.index');
    }

    public function register($student_id, $section_id){
        //Check if User can register course

        return view('pages.exams.registration.register',[
            'student_id' => $student_id,
            'section_id' => $section_id,
            'exam' => Exam::find(
                                SchoolSetting::getSchoolSetting('active.exam')
                            ),
        ]);
    }

    public function store(Request $request){
        
    }
}
