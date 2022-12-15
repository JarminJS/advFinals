<?php

use App\Http\Controllers\dbControl;
use App\Http\Controllers\homeControl;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [homeControl::class, 'index']); 

Route::get('/index', [homeControl::class, 'index']); 
 
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         $students = Student::paginate(8); 
//         return view('dashboard', ["students" => $students]);
//     })->name('dashboard');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [dbControl::class, 'supervised'])->name('dashboard');
});

Route::get("/students", [dbControl::class, 'students']); 

Route::get("/users", [dbControl::class, 'users']); 

Route::get("/projects", [dbControl::class, 'listprojects']); 

Route::get("/details/{id}", [dbControl::class, 'details']);

Route::get("/update/{id}", [dbControl::class, 'update']);

Route::get('/supervised', [dbControl::class, 'supervised']);

Route::post('/updated', [dbControl::class, 'updateProject']); 

Route::get('/create', [dbControl::class, 'create']); 

Route::post('/created', [dbControl::class, 'createProject']); 
