<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\dept;
use App\Models\Leave;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class employeecontroller extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        function generateEmpId()
        {
            $lastEmp = User::orderBy('id', 'desc')->first();
            if (!$lastEmp) {
                return 'seeree001';
            }
            preg_match('/(\d+)$/', $lastEmp->empid, $matches);
            $nextId = str_pad($matches[0] + 1, 3, '0', STR_PAD_LEFT);
            return 'seeree' . $nextId;
        }
        if ($request->validate(
            [
                "name" => "required",
                "email" => "required | email | unique:users,email",
                "phone" => "required",
                "password" => "required | min:4",
                "gender" => "required | in:male,female",
                "deptid" => "required",
                "role" => "required",
                "photo" => "required | image | max:5120"
            ]
        )) {
            $empid = generateEmpId();
            $img = $request->photo;
            $imgname = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path("images"), $imgname);
            $insert = User::create([
                'empid' => $empid,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'deptid' => $request->deptid,
                'role' => $request->role,
                'photo' => $imgname,
                'status' => $request->status,
                'max_leave' => $request->max_leave,
            ]);
        }
        if ($insert) {
            return redirect("/login")->with('success', 'Registation successfull, please Login');
        } else {
            return redirect()->back();
        }
    }
    public function login(Request $request)
    {
        $user = $request->only('email', 'password');
        $login = Auth::attempt($user);
        if ($login) {
            Session::put(
                [
                    "id" => Auth::user()->id,
                    "empid" => Auth::user()->empid,
                    "name" => Auth::user()->name,
                    "email" => Auth::user()->email,
                    "phone" => Auth::user()->phone,
                    "gender" => Auth::user()->gender,
                    "deptid" => Auth::user()->deptid,
                    "role" => Auth::user()->role,
                    "photo" => Auth::user()->photo,
                    "status" => Auth::user()->status,
                    "max_leave" => Auth::user()->max_leave,
                ]
            );
            if (Auth::user()->status == "Inactive") {
                return redirect("/login")->with('notactive', 'Your Account is not Active.');
            } else {
                if (Auth::user()->role == "admin") {
                    return redirect("/adminDashbord/profile");
                } elseif (Auth::user()->role == "hr") {
                    return redirect("/hrDashbord/profile");
                } elseif (Auth::user()->role == "employee") {
                    return redirect("/employeeDashbord/profile");
                } else {
                    return redirect()->back();
                }
            }
        } else {
            return redirect("/login")->with('notsuccess', 'Login Again with correct email and password !');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect("/login");
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/register')->with('success', 'Account deleted successfully.');
    }

    // status check active or not.....
    public function statuschenge($id)
    {
        $userstatus = User::find($id);
        if ($userstatus->status == "Inactive") {
            $userstatus->status  = "Active";
        } else {
            $userstatus->status  = "Inactive";
        }
        $userstatus->save();
        if ($userstatus) {
            return redirect("/adminDashbord/employeeslist");
        }
    }
    // emp status check active or not.....
    public function empstatuschenge($id)
    {
        $empstatus = User::find($id);
        if ($empstatus->status == "Inactive") {
            $empstatus->status  = "Active";
        } else {
            $empstatus->status  = "Inactive";
        }
        $empstatus->save();
        if ($empstatus) {
            return redirect("/hrDashbord/employeeslist");
        }
    }
    public function update($id)
    {
        $update = User::find($id);
        // return $update;
        $dept = Dept::all();
        return view("update")->with(["dept" => $dept, "update" => $update]);
    }
    public function update_done(Request $request, $id)
    {
        $update = User::find($id);
        $update->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'deptid' => $request->deptid,
            'role' => $request->role,
        ]);
        if ($update) {
            Session::put(
                [
                    "id" => $update->id,
                    "empid" => $update->empid,
                    "name" => $update->name,
                    "email" => $update->email,
                    "phone" => $update->phone,
                    "gender" => $update->gender,
                    "deptid" => $update->deptid,
                    "role" => $update->role,
                    "photo" => $update->photo,
                    "status" => $update->status,
                    "max_leave" => $update->max_leave,
                ]
            );
            if ($update->role == "hr") {
                return redirect('/hrDashbord/profile')->with("update_success", "Profile Update successfully.");
            } elseif ($update->role == "employee") {
                return redirect('/employeeDashbord/profile')->with("update_success", "Profile Update successfully.");
            } else {
                return redirect()->back();
            }
        }
    }

    public function registerleave(Request $request)
    {
        // dd($request->all());
        $docm = $request->document;
        if ($docm) {
            $document = time() . '.' . $docm->getClientOriginalExtension();
            $docm->move(public_path("documents"), $document);

            $insert = Leave::create([
                'empid' => $request->empid,
                'reason' => $request->reason,
                'leave_message' => $request->leave_message,
                'document' => $document,
                'fromdate' => $request->fromdate,
                'todate' => $request->todate,
                'leave_days' => $request->leave_days,
                'leave_status' => $request->leave_status,
            ]);
        } else {
            $insert = Leave::create([
                'empid' => $request->empid,
                'reason' => $request->reason,
                'leave_message' => $request->leave_message,
                'document' => NULL,
                'fromdate' => $request->fromdate,
                'todate' => $request->todate,
                'leave_days' => $request->leave_days,
                'leave_status' => $request->leave_status,
            ]);
        }
        if ($insert) {
            return redirect()->back()->with('success', "Leave Application Send Successfully");
        } else {
            return redirect()->back()->with("notsuccess", "Leave application Send Unsuccessful");
        }
    }

    // all users leave approve
    public function userleaveapprove($id)
    {
        $usersLeavestatus = Leave::where('leave_id', $id)->first();
        if ($usersLeavestatus->leave_status == "Pending") {
            $usersLeavestatus->leave_status  = "Approve";
        } else {
            $usersLeavestatus->leave_status  = "Pending";
        }
        $usersLeavestatus->save();
        if ($usersLeavestatus) {
            return redirect("/adminDashbord/leaveList");
        }
    }

    // employee Leave List approve
    public function empleaveapprove($id)
    {
        $empsLeavestatus = Leave::where('leave_id', $id)->first();
        if ($empsLeavestatus->leave_status == "Pending") {
            $empsLeavestatus->leave_status  = "Approve";
        }
        $empsLeavestatus->save();
        if ($empsLeavestatus) {
            return redirect("/hrDashbord/leaveList");
        }
    }
}
