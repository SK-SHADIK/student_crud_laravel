<?php

namespace App\Http\Controllers\UMS;

use App\Http\Controllers\Controller;
use App\Models\UMS\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    //
    public function viewApiStudent(){
        
        $student = Student::all();
        return response()->json($student);
    }
    public function createApiStudent(){

        return response()->json();
    }
    public function storeApiStudent(Request $request)
    {
        $this->validate($request, [
            "name" => "required|regex:/^[a-zA-Z\s\.\-]+$/", // Small and capital letters, '.', and '-' accepted
            "email" => "required|email", // Ensure the email format is valid
        ], [
            "name.required" => "Please provide your name!!!",
            "name.regex" => "Please provide your name properly (. & - is accepted)!!!",
            "email.required" => "Please provide your email!!!",
            "email.email" => "Please provide a correct email format (e.g., abc@gmail.com)!!!",
        ]);
    
        $st = new Student();
        $st->name = $request->name;
        $st->email = $request->email;
        $st->save();
    
        return response()->json(["msg" => "Success", "data" => $st]);
    }
    public function showApiStudent($id){
        
        $data = Student::find($id);
        return response()->json(['data', $data]);
    }
    function editApiStudent(Request $req){
        
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
        
        return response()->json(["msg" => "Success", "data" => $st]);
    }
    public function deleteApiStudent(Request $request){

        $id = $request->id;
        $data = Student::where('id', $id)->first();
        $data->delete();
        return response()->json(["msg" => "Success", "data" => $data]);
    }
}
