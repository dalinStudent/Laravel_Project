<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

       return view ('students.listStudent',compact('students'));
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
        $student = new Student();
        $student->firstName = $request->fname;
        $student->lastName = $request->lname;
        $student->class = $request->class;
        $student->description = $request->description;
        $student->activefollowup = 1;
        $student->user_id = $request->tutor; 
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('img/', $filename);
            $student->picture = $filename;    
        }   
        $student->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        return view ('students.viewStudent',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view ('students.editForm',compact('student'));

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
        $student = Student::find($id);
        $student->firstName = $request->fname;
        $student->lastName = $request->lname;
        $student->class = $request->class;
        $student->description = $request->description;
        $student->user_id = $request->tutor;
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().".".$extension;
            $file->move('img/', $filename);
            $student->picture = $filename;    
        }   
        $student->save();

        return redirect('/home');
    }

    /**
     * Display the out student followup view
     */

    public function returnOutFollowUp(){
        $users = User::all();
        $students = Student::all();
        return view('students.outFollowup', compact('students', 'users'));
    }

    /**
     * out followup view
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function outFollowup($id)
    {
        $student = Student::find($id);
        $student->activeFollowup = 0;
        $student->save();
        return redirect('/returnOutFollowUp');
    }

    public function backFolloup($id) {
        if(auth::user()->role==1){
            $student = Student::find($id);
            $student->activefollowup = 1;
            $student->save();
            $result = redirect('/home');
        }else{
            $result = "Unauthorize user";
        }
        return $result;
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
