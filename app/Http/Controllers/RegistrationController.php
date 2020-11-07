<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
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
        $data = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required'
        ]);
        $regis = new Registration;
        $regis->student_id = $data['student_id'];
        $regis->course_id = $data['course_id'];
        $regis->save();
        return redirect('/student/'.$data['student_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentData = DB::table('students')->where('student_id',$id)->get();
        $courseData = DB::table('registrations')->where('student_id',$id)->get();
        $courseOfStudent = [];
        for($i=0;$i<sizeof($courseData);$i++){
            $detail = DB::table('courses')->where('course_id',$courseData[$i]->course_id)->get();
            array_push($courseOfStudent,$detail[0]); 
        } 
        // print_r($courseOfStudent);
        return view('Student.showStudentData',compact(['studentData','courseOfStudent']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
