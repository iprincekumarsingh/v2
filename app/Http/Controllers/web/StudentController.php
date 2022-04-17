<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodeGenerate;
use App\Models\Attendances;
use App\Models\Branches;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    //

    public function attendance(Request $request)
    {
        $codeverif = CodeGenerate::where('code', $request['code'])
            ->first();
        if ($codeverif) {
            // return response()->json(array('msg' => "Code Successfully Matched"), 200);
            $attendance = Attendances::where('id', Auth::user()->id)
                ->orderBy('aid', 'DESC')
                ->first();
            $today_date = now()->format('y-m-d');

            // checking the attendance is null or not
            if ($attendance == null || $attendance['updated_at']->format('y-m-d') != $today_date) {

                $newad = new Attendances;
                $newad->id = Auth::user()->id;
                // $newad->dob = $today_date;
                $newad->a_status = 1;
                $newad->save();
                return response()->json(array('status' => 1), 201);
            }
        } else {
            return response()->json(array("status" => 0));
        }
    }
    public function agn()
    {
        $subject = Subject::join('branches', 'subjects.branch_id', '=', 'branches.branch_id')
            ->where('branches.name', Auth::user()->branch)
            ->get(['branches.name', 'subjects.*']);
        return view('assignment')->with(compact('subject'));

    }
}
