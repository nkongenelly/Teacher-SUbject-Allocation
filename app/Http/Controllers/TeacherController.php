<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Subject;

class TeacherController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all details for teachers and join to get subject name
        $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                            ->select('teachers.*','subjects.name')
                            ->get();
        //  dd($teachers);
        return view('teachersSubjects',compact('teachers'));
    }
    public function search(Request $request)
    {
        // dd(request('firstName'));
        //Get all details for teachers and join to get subject name
        $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                            ->where('teachers.firstName','=',request('firstName'))
                            ->select('teachers.*','subjects.name')
                            ->get();
        //  dd($teachers);
        return view('teachersSubjects',compact('teachers'));
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
        // $this->validate(request(),[
        //     'firstName'=>'required',
        //     'lastName'=>'required',
        //     'email'=>'required',
        //     'subjectid'=>'required'
        // ]);
        Teacher::create(request(['firstName','lastName','email','subjectid']));
        $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                            ->select('teachers.*','subjects.name')
                            ->get();
        //  dd($teachers);
        return view('teachersSubjects',compact('teachers'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pre-populate form with previous data to edit
        $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                            ->where('teachers.id','=',$id)
                            ->select('teachers.*','subjects.name')
                            ->get();
        // $teacher = Teacher::find($id);
        $subjects = Subject::all();
        foreach($teachers as $teacher){

        }
        // dd($teacher);
        return view('teachersEdit',compact(['teacher','subjects']));
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
        //udate specific teachers record
        Teacher::where('id',$id)
                ->update(request(['firstName','lastName','email','subjectid']));
                $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                ->select('teachers.*','subjects.name')
                ->get();
//  dd($teachers);
return view('teachersSubjects',compact('teachers'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete this particular record from teachers table
        Teacher::where('id',$id)
                ->delete();
       
                $teachers = Teacher::join('subjects','subjects.subjectid','=','teachers.subjectid')
                            ->select('teachers.*','subjects.name')
                            ->get();
        //  dd($teachers);
        return view('teachersSubjects',compact('teachers'));
    }
}
