<?php

namespace App\Http\Controllers\UMS;

use App\Http\Controllers\Controller;
use App\Models\UMS\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function viewStudent(){
        $student=Student::all();
        return view('studentList')->with('students', $student);
    }
}
