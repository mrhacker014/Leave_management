<?php

use App\Http\Controllers\employeecontroller;
use App\Http\Middleware\checkAuth;
use App\Http\Middleware\checkRole;
use App\Models\dept;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Leave;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/holiday', function () {
    return view('holiday');
});
Route::get('/login', function () {
    return view('login');
});
Route::post('/login',[employeecontroller::class,'login']);
Route::get('/register', function () {
    $data = dept::all();
    return view('register')->with("dept",$data);
});
Route::post("/register",[employeecontroller::class,"register"]);
Route::get("/logout",[employeecontroller::class,"logout"])->middleware(checkAuth::class);

Route::get('/adminDashbord/profile', function () {
    return view('index_admin');
})->middleware(checkAuth::class)->middleware(checkRole::class . ":admin");
Route::get('/adminDashbord/employeeslist', function () {
    $data = User::join('depts', 'depts.dept_id', '=', 'users.deptid')->where("role", "!=", "admin")->paginate(4);
    return view('usermanagement')->with("data", $data);
})->middleware(checkAuth::class)->middleware(checkRole::class . ":admin");

Route::get('/hrDashbord/employeeslist', function () {
    $data = User::join('depts', 'depts.dept_id', '=', 'users.deptid')->where("role", "=", "employee")->paginate(4 );
    return view('empmanagement')->with("data", $data);
})->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");

Route::get('/userlist/{id}',[employeecontroller::class,'statuschenge'])->middleware(checkAuth::class);

Route::get('/employeeslist/{id}',[employeecontroller::class,'empstatuschenge'])->middleware(checkAuth::class);

Route::get('/hrDashbord/profile', function () {
    return view('index_hr');
})->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");

Route::get('/employeeDashbord/profile', function () {
    return view('index_employee');
})->middleware(checkAuth::class)->middleware(checkRole::class . ":employee");
Route::delete('/delete-account/{id}', [employeecontroller::class,"delete"])->name('delete.account')->middleware(checkAuth::class);
Route::get('/Dashbord/profile/update/{id}',[employeecontroller::class,'update'])->middleware(checkAuth::class);
Route::post('/Dashbord/profile/update/{id}',[employeecontroller::class,'update_done'])->middleware(checkAuth::class);

Route::get('/employeeDashbord/applyleave', function () {
    return view('leave_form');
})->middleware(checkAuth::class)->middleware(checkRole::class . ":employee");
Route::post('employee-registerleave/',[employeecontroller::class,'registerleave'])->middleware(checkAuth::class)->middleware(checkRole::class . ":employee");

// hr leave apply
Route::get('/hrDashbord/applyleave', function () {
    return view('hr_leave_form');
})->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");
Route::post('hr-registerleave/',[employeecontroller::class,'registerleave'])->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");

// all user leave list
Route::get('/adminDashbord/leaveList', function () {
    $data = Leave::join('users', 'users.empid', '=', 'leaves.empid')->paginate(6);
    return view('user_leaveList')->with("data", $data);
})->middleware(checkAuth::class)->middleware(checkRole::class . ":admin");
// all user leave list approve
Route::get('/user-leave-list/{leave_id}',[employeecontroller::class,'userleaveapprove'])->middleware(checkAuth::class)->middleware(checkRole::class . ":admin");

// employee leave list
Route::get('/hrDashbord/leaveList', function(){
    $data = Leave::join('users', 'users.empid', '=', 'leaves.empid')->where("users.role", "=", "employee")->get();
    return view('emp_leaveList')->with('data',$data);
})->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");

// employee leave list approve
Route::get('/employee-leave-list/{leave_id}',[employeecontroller::class,'empleaveapprove'])->middleware(checkAuth::class)->middleware(checkRole::class . ":hr");