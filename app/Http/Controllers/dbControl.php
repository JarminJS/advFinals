<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class dbControl extends Controller
{
    public function index(){
        $students = Student::paginate(10); 

        return view('dashboard', ["students" => $students]); 
    }
}
