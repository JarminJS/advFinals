<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dbControl extends Controller
{
    public function students(){
        $students = Student::paginate(10); 

        return view('admin.students', ["students" => $students]); 
    }

    public function users(){
        if(Auth::user()->usertype != '1'){
            return view('admin.unauthorized'); 
        }
        
        $users = User::paginate(10); 

        return view('admin.users', ["users" => $users]); 
    }

    public function listprojects(){
        if(Auth::user()->usertype != '1'){
            return view('admin.unauthorized'); 
        }

        $projects = Project::paginate(4); 

        return view('admin.listprojects', ["projects" => $projects]); 
    }

    public function supervised(){
        $id = Auth::user()->id; 

        $projects = Project::where('supervisorId', $id)->get();  
        
        return view('admin.supervised', ["projects" => $projects]); 
    }

    public static function details($id){
        $project = Project::find($id);
        
        return view('admin.detail', ["project" => $project]);
    }

    public static function update($id){
        $project = Project::find($id);
        
        return view('admin.update', ["project" => $project]);
    }

    public function create(){

        if(Auth::user()->usertype != '1'){
            return view('admin.unauthorized'); 
        }

        $students = Student::all(); 
        $lecturers = User::all(); 

        return view('admin.create', ['lecturers' => $lecturers, 'students' => $students]); 
    }

    public static function getStudent($id){
        return Student::find($id)->name; 
    }

    public static function getLect($id){
        return User::find($id)->name; 
    }

    public static function getUsertype(){
        return Auth::user()->usertype; 
    }


    public function updateProject(Request $req){

        $req->validate([
            'endDate' => 'date|after:startDate', 
        ]); 

        $id = $req->input('id'); 

        $project = Project::find($id); 

        $project->title = $req->input('title'); 
        
        $project->category = $req->input('category'); 

        $project->startDate = $req->input('startDate'); 
        
        $project->endDate = $req->input('endDate'); 

        $ts1 = strtotime($req->input('startDate'));
        $ts2 = strtotime($req->input('endDate'));

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

        $project->duration = $diff; 

        $project->progress = $req->input('progress'); 

        $project->status = $req->input('status'); 

        $project->save(); 

        return redirect('/supervised'); 
    }

    public function createProject(Request $req){

        $req->validate([
            'studentId' => 'required|unique:projects,studentId', 
             
            'supervisorId' => 'different:examiner2Id', 
            'examiner1Id' => 'different:examiner2Id',
            'examiner2Id' => 'different:examiner1Id',
            'supervisorId' => 'different:examiner1Id' 
        ]); 

        $project = new Project; 

        $project->studentId = $req->studentId; 
        $project->supervisorId = $req->supervisorId; 
        $project->examiner1Id = $req->examiner1Id; 
        $project->examiner2Id = $req->examiner2Id; 

        $project->save(); 

        return redirect('/projects'); 
    }

    function addstudent(Request $req){
        $student = new Student; 

        $student->name = $req->input('name'); 

        $student->save();

        return redirect('/students'); 
    }

}

