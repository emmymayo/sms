<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamReportEntryController extends Controller
{
    public function index(){

        return view('pages.exams.report.entry');
    }
}
