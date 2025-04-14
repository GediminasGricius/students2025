<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StudentController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('students.create'        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $request->validate();
        $student = new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //$request->validate();



        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->email=$request->email;
        $student->phone=$request->phone;

        if ($request->hasFile("photo")){
            $tmp=$request->file("photo")->store("/public");
            $student->photo=$request->file("photo")->hashName();
        }

        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }

    public function deletePhoto($student){
        $student=Student::find($student);
        unlink( storage_path()."/app/public/".$student->photo);
        $student->photo=null;
        $student->save();
        return redirect()->back();
    }
}
