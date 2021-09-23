<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class ExamReportEntryController extends Controller
{
    public function index(){

        return view('pages.exams.report.entry');
    }
    public function viewEntries(){

        return view('pages.exams.report.entry-view');
    }

    public function update(Request $request,$mark_id){
       // return response()->json(['message'=>$request->input('cass2')],201);
        $mark = Mark::find($mark_id);
        $mark->cass1 = $request->input('cass1');
        $mark->cass2 = $request->input('cass2');
        $mark->tass = $request->input('tass');
        if($mark->save()){
            return response()->json(['message'=>'success'],201);
        }
        return response()->json(['message'=>'failed']);

    }
}
