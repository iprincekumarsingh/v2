<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\FacultyTodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    public function todo()
    {
        $todo = FacultyTodo::where('f_user_id', Auth::user()->id)->get();
        return view('facultites.todo')->with(compact('todo'));
    }
    public function todoSave(Request $request)
    {
        $todo =  new FacultyTodo;
        $todo->title = $request['title'];
        $todo->text = $request['text'];
        $todo->f_user_id = Auth::user()->id;
        $todo->save();
        return back();
    }
    public function todoDelete($delete)
    {
        $todofind = FacultyTodo::where('fid', $delete);
        if ($todofind) {
            $todofind->delete();
        }
        return back();
    }
}
