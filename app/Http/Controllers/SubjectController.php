<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Subject::class);
        return view('pages.subjects.index',[
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Subject::class);
        $request->validate([
            'name' => 'required|max:100',
            'short_name' => 'required|max:100'
        ]);

        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->short_name = $request->input('short_name');
        if($subject->save()){
            return back()->with('action-success','Subject added successfully.');
        }
        return back()->with('action-fail','Something went wrong. Try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $this->authorize('update',$subject);
        return view('pages.subjects.edit',[
            'subject' => $subject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $this->authorize('update',$subject);
        $request->validate([
            'name' => 'required|max:100',
            'short_name' => 'required|max:100'
        ]);

        $subject->name = $request->input('name');
        $subject->short_name = $request->input('short_name');
        if($subject->save()){
            return redirect('/subjects')->with('action-success','Subject updated successfully.');
        }
        return back()->with('action-fail','Something went wrong. Try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $this->authorize('delete', $subject);
        if($subject && $subject->save()){
            return back()->with('action-success','Subject deleted successfully.');
        }
        return back()->with('action-fail','Something went wrong. Try again.');
    }
}
