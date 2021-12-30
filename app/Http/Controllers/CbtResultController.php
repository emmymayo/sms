<?php

namespace App\Http\Controllers;

use App\Models\CbtResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CbtResultController extends Controller
{
    public function index()
    {
        
        if(request()->expectsJson()){
            $cbt_results = $this->getCbtResults();
            return response()->json($cbt_results);
        }
        return ;
    }

    public function show($id)
    {
        $cbt_result = CbtResult::find($id);
        if(request()->expectsJson()){
            return response()->json($cbt_result);
        }
        return;
    }

    public function store(Request $request){
        //Authorize user
        Gate::authorize('admin-and-teacher-only');
        $data = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'student_id' => 'required|exists:students,id',
            'cbt_id' => 'required|exists:cbts,id',
            'cbt_question_id' => 'required|exists:cbt_questions,id',
            'answer' => 'nullable',
            'seconds_left'=> 'nullable|integer',
        ]);
        $cbt_result = CbtResult::create($data);
        if($request->expectsJson()){
            return response()->json([
                'message' => 'success',
                'data' => $cbt_result
            ],201);
        }
        return;
    }

    public function update(Request $request, $id){
        //Authorize user
        Gate::authorize('admin-and-teacher-only');
        $data = $request->validate([
            'section_id' => 'nullable|exists:sections,id',
            'student_id' => 'nullable|exists:students,id',
            'cbt_id' => 'nullable|exists:cbts,id',
            'cbt_question_id' => 'nullable|exists:cbt_questions,id',
            'answer' => 'nullable',
            'seconds_left'=> 'nullable|integer',
        ]);
        $cbt_result = CbtResult::find($id);
        $cbt_result->update($data);
        if($request->expectsJson()){
            return response()->json([
                'message' => 'success'
            ],201);
        }
        return;
    }
   

    public function destroy($id){
        //Authorize user
        Gate::authorize('admin-and-teacher-only');
        CbtResult::destroy($id);
        if(request()->expectsJson()){
            return response()->json(['message' => 'success']);
        }
    }


    private function getCbtResults(){
        //Get Eloquemt Query builder after applying filters and ordering
        $cbt_result_query = CbtResult::query()
                    ->when(request()->has('student_id'),
                        function($query){
                            $query->where('student_id',request()->input('student_id'));
                        }
                    )->when(request()->has('section_id'),
                        function($query){
                            $query->where('section_id',request()->input('section_id'));
                        }
                    )->when(request()->has('cbt_id'),
                        function($query){
                            $query->where('cbt_id',request()->input('cbt_id'));
                        }
                    )->when(request()->has('cbt_question_id'),
                        function($query){
                            $query->where('cbt_question_id',request()->input('cbt_question_id'));
                        }
                    )->when(request()->has('order'), 
                        function($query){
                            $query->orderBy(request()->input('order'),request()->input('direction','desc'));
                        }
                    )->when(!request()->has('order'), 
                        function($query){
                            $query->latest();
                        }
                    );
    
        //Whenever url query contains page then paginate, else return the collection
        $cbt_results = request()->has('page') ? $cbt_result_query->paginate() : $cbt_result_query->get();
        return $cbt_results;
    }

}
