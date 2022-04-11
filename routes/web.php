<?php

use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\FacultyController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Attendances;
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
    Route::post('/attendance', function () {
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
            return to_route('dashboard');
        } else {

            return to_route('dashboard');
        }
    })->name('attendance-submit');
    Route::get('/attendance', function () {

        $studentPAttendance = User::join('attendances', 'users.id', '=', 'attendances.id')
            ->where('users.id',  Auth::user()->id)
            ->get();

        // echo $usersDetails;
        return view('attendance')->with(compact('studentPAttendance'));
        return view('attendance');
    })->name('attendance');
    Route::get('/assignment', function () {


        // echo $usersDetails;
        return view('assignment')->with(compact('usersDetails'));
    })->name('assignment');


    Route::controller(AdminController::class)->group(function () {
        Route::get('/student', 'student')->name('student');
        Route::get('/user-profile/{regno}', 'studentprofile')->name('studentdata');
        Route::get('/userfattendance/{uid}', 'studentattendance')->name('studentattendance');
        Route::get('/branch', 'branch')->name('branch');
        Route::post('/branchSave', 'branchSave')->name('branchSave');
        Route::post('/student', 'filterBranch')->name('filterBranch');
    });
    Route::controller(FacultyController::class)->group(function () {
        Route::get('/todo', 'todo')->name('fatodo'); //faculty todo
        Route::post('/todo', 'todoSave')->name('fatodoSave'); //faculty todo
        Route::get('/todo/{delete}', 'todoDelete')->name('fatodoDelete'); //faculty todo

    });
});
