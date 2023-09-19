<?php

namespace App\Http\Controllers\UMS;

use App\Http\Controllers\Controller;
use App\Models\UMS\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewStudent(){
        
        $student = Student::all();
        return view('studentList')->with('students', $student);
    }
    public function createStudent(){

        return view('createStudent');
    }
    public function storeStudent(Request $request){

        $this->validate($request,
             [
                "name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "email"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
             ],
             [
                "name.required"=> "Please provide your name!!!",
                "name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "email.required"=> "Please provide your email!!!",
                "email.regex"=> "Please provide correct email like abc@gmail.com!!!",
             ]
        );
        $st = new Student();
        $st->name= $request->name;
        $st->email= $request->email;
        $st->save();
        
        return redirect()->route('view.student')->with('success', 'Student has been added successfully');
    
    }
    public function showStudent($id){
        
        $data = Student::find($id);
        return view('editStudent',['data'=>$data]);
    }
    function editStudent(Request $req){
        
        $this->validate($req,
             [
                "name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "email"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
             ],
             [
                "name.required"=> "Please provide your name!!!",
                "name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "email.required"=> "Please provide your email!!!",
                "email.regex"=> "Please provide correct email like abc@gmail.com!!!",
             ]
        );
        $st = student::find($req->id);
        $st->name = $req->name;
        $st->email = $req->email;
        $st->save();
        
        return redirect()->route('view.student')->with('success', 'Student details has been updated successfully');
    }
    public function deleteStudent(Request $request){

        $id = $request->id;
        $data = Student::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('success', 'Student has been deleted successfully');
    }
}
