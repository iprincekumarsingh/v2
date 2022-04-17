<?php

use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\FacultyController;
use App\Http\Controllers\web\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Attendances;
use App\Models\CodeGenerate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return to_route('dashboard');
    });

    // Dashboard route or home route
    Route::get('/dashboard', function () {
        $attendance = Attendances::where('id', Auth::user()->id)

            ->orderBy('aid', 'DESC')
            ->first();
        $user = User::select('id')->get();
        $userCount = $user->count();
        session()->put('usercount', $userCount);

        $today_date = now()->format('y-m-d');

        // checking the attendance is null or not
        if ($attendance == null || $attendance['updated_at']->format('y-m-d') != $today_date) {
            session()->put('isSubmitted', 0);
        } else {
            session()->put('isSubmitted', 1);
        }
        return view('dashboard');
    })->name('dashboard');

    // Student attendance submission route and function
    Route::post('/attendance', function (Request $request) {
    })->name('attendance-submit');
    // attendance get feature
    Route::get('/attendance', function () {

        $studentPAttendance = User::join('attendances', 'users.id', '=', 'attendances.id')
            ->where('users.id',  Auth::user()->id)
            ->get();

        // echo $usersDetails;
        return view('attendance')->with(compact('studentPAttendance'));
        return view('attendance');
    })->name('attendance');

    // Future feature
    Route::get('/assignment', function () {
        // echo $usersDetails;
        return view('assignment')->with(compact('usersDetails'));
    })->name('assignment');


    // Admin Conrtoller
    Route::controller(AdminController::class)->group(function () {
        Route::get('/student', 'student')->name('student');
        Route::get('/user-profile/{regno}', 'studentprofile')->name('studentdata');
        Route::get('/userfattendance/{uid}', 'studentattendance')->name('studentattendance');
        Route::get('/branch', 'branch')->name('branch');
        Route::post('/branchSave', 'branchSave')->name('branchSave');
        Route::post('/student', 'filterBranch')->name('filterBranch');
    });
    // Faculty Controller
    Route::controller(FacultyController::class)->group(function () {
        Route::get('/todo', 'todoview')->name('fatodoviw'); //faculty todo
        Route::get('/tododata', 'todo')->name('fatodo'); //faculty todo

        Route::post('/todo', 'todoSave')->name('fatodoSave'); //faculty todo
        Route::get('/todo/{delete}', 'todoDelete')->name('fatodoDelete'); //faculty todo
        Route::get('/codesave', 'savecode');
    });

    Route::controller(StudentController::class)->group(function () {

        Route::post('/attendance', 'attendance')
            ->name('attendance-submit');

        Route::get('/assignmnet', 'agn')->name('agn.student');
    });
});
