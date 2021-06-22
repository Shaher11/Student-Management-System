<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return response()->json($students);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $student= Student::create($data);

        foreach ($request->course_ids as $course_id) {
            $student->courses()->attach($course_id);
        }
  

     
        return response()->json($student, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student_id)
    {
        $student = Student::findOrFail($student_id); 
        $student_course = $student->courses; 
        
        return response()->json($student, 200);

        
    }
    
    // public function getStudentCourses($student_id){
        
    //     $student = Student::findOrFail($student_id);
    //     $courses = $student->courses();
        
    //     return response()->json($courses, 200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $student = Student::findOrFail($id);
        // if (!$student) {
        //     return response()->json(['message' => 'business is not found'], 404);
        // } else {
        //     $student->update($request->validated());
        //     return response()->json($student, 200);
        // }
        $data = array();
        $data['level_id'] = $request->level_id;
        $data['program_id'] = $request->program_id;
        $data['identifier'] = $request->identifier;
        $data['first_name'] = $request->first_name;
        $data['middle_name'] = $request->middle_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['birthdate'] = $request->birthdate;

        $user = DB::table('students')->where('id',$id)->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student_id)
    {
        $student = Student::findOrFail($student_id);
        if (!$student) {
            return response()->json(['message' => 'business is not found'], 404);
        } else {
            $student->delete();
            return response()->json(['message' => 'business deleted successfuly'], 200);
        }
    }
}