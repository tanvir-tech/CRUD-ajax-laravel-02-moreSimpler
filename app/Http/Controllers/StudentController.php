<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    function addStudent(Request $req){

        $req->validate([
            'name'=>'required'
        ]);

        $data = Student::insert([
            'name'=>$req->name
        ]);

        // return $data;
    }

    function listStudent(Request $req){
        $data = Student::orderBy('id','DESC')->get();
        return response()->json($data);
    }


    function deleteStudent($id){
        Student::destroy($id);

        return response()->json([
            'success' => 'Student has been deleted successfully!'
        ]);
    }


    function getvaluesToEdit($id){

        $data = Student::findOrFail($id);
        return response()->json($data);
    }




    function updateStudent(Request $req, $id){
        $req->validate([
            'name'=>'required'
        ]);
        
        $student = Student::findOrFail($id);

        $student->Name = $req->name;

        $student->save();

    }



}
