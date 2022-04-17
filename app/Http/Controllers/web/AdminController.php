<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Attendances;
use App\Models\Branches;
use App\Models\Sub_Branches;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function student()
    {
        // fetching student
        $branch = Branches::get();
        $student = User::select('id', 'name', 'branch', 'regno')
            ->where('role', 'student')
            ->paginate(15);
        return view('admin.student')->with(compact('student', 'branch'));
    }
    public function studentprofile($regno)
    {
        $student = User::where('regno', $regno)
            ->get();
        return view('uprofile')->with(compact('student'));
    }
    public function branch()
    {
        $branch = Branches::get();
        $subBranch = Sub_Branches::get();
        session()->put('formid', 1);
        return view('admin.form')->with(compact('branch', 'subBranch'));
    }
    public function branchSave(Request $request)
    {

        if ($request['key'] == 0) {
            $branch = new Branches;
            $branch->name = $request['name'];
            $branch->save();
        } elseif ($request['key'] == 1) {
            $subBranches = new Sub_Branches;
            $subBranches->sub_name = $request['sub_branch'];
            $subBranches->branch_id = $request['branch'];
            $subBranches->save();
        } elseif ($request['key'] == 2) {
            $subject = new Subject;
            $subject->sub_branch_id = $request['sub_branch'];
            $subject->branch_id = $request['branch'];
            $subject->subject_name = $request['subject'];
            $subject->save();
        }
        return back();
    }
    public function filterBranch(Request $req)
    {
        $student = User::where('branch', $req['branchid'])->get();
        $branch = Branches::get();
        return view('admin.student')->with(compact('student', 'branch'));
    }
    public function studentattendance($name, $uid)
    {
        $studentPAttendance = Attendances::where('id', $uid)->get();

        return view('attendance')->with(compact('studentPAttendance', 'name'));
    }
}
