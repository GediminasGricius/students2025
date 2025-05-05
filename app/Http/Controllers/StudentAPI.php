<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAPI extends Controller
{
    public function index(){
        return Student::all();
    }

    public function show($id){
        return Student::find($id);
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();

        return $student;
    }

    public function update(Request $request,$id){
        $student=Student::find($id);
        $student->name=$request->name;
        $student->surname=$request->surname;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();

        return $student;
    }

    public function destroy($id){
        Student::destroy($id);
        return $id;
    }
}
