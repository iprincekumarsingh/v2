<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CodeGenerate;
use App\Models\FacultyTodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function todo()
    {
        $todo = FacultyTodo::where('f_user_id', Auth::user()->id)->get();

        return  response()->json(array('todo' => $todo), 200);
    }
    public function todoview()
    {
        return view('facultites.todo');
        # code...
    }
    public function todoSave(Request $request)
    {
        $todo =  new FacultyTodo;
        $todo->title = $request['title'];
        $todo->text = $request['text'];
        $todo->f_user_id = Auth::user()->id;
        $todo->save();
        return response()->json(array('status' => 1), 200);

        // return back();
    }
    public function todoDelete($delete)
    {
        $todofind = FacultyTodo::where('fid', $delete);
        if ($todofind) {
            $todofind->delete();
        }
        return back();
    }

    public function savecode(Request $request)
    {
        $savecode = new CodeGenerate;
        $savecode->code = $request['code'];
        $savecode->fa_id = Auth::user()->id;
        $savecode->save();
        return response()->json(array('msg' => "Code updated successfully"), 200);
    }
    public function faculprofile()
    {

        return view('facultites.faculprofile');
    }
    // faculty delete code

    public function deletecode()
    {

        $codeData = CodeGenerate::where('fa_id', Auth::user()->id)->get();
        return response()->json(array('code' => $codeData));
        // return back();

    }
}
