<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


Route::get('/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::get('/forgot', [\App\Http\Controllers\UserController::class, 'forgot']);
Route::get('/reset/{email}/{token}', [\App\Http\Controllers\UserController::class, 'reset'])->name('reset');

Route::post('/register', [\App\Http\Controllers\UserController::class, 'saveUser'])->name('auth.register');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginUser'])->name('auth.login');
Route::post('/forgot-password', [\App\Http\Controllers\UserController::class, 'forgotPassword'])->name('auth.forgot');
Route::post('/reset-password', [\App\Http\Controllers\UserController::class, 'resetPassword'])->name('auth.reset');

Route::group(['middleware'=>['LoginCheck']], function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('register');
    Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('auth.logout');
    Route::get('/profile',[\App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/profile-image', [\App\Http\Controllers\UserController::class, 'profileImageUpdate'])->name('profile.image');
    Route::post('/profile-edit', [\App\Http\Controllers\UserController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/profile-update', [\App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/main-church-members', [\App\Http\Controllers\Admin\DashboardController::class, 'churchMembers'])->name('members.index');
});
Route::get('/test', function (){


    $estates= config('membership.estate');

    $estate_names = array_column($estates, 'id');
    $found_key = array_search(1, $estate_names);

    return response()->json($found_key, 200);
//    return response()->json($estates, 200);
});
    Route::get('all-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });
    Route::get('child-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });
    Route::get('teenie-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });
    Route::get('youth-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });
    Route::get('middle-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });
    Route::get('adult-main-members', function (){
        $members = User::all();
        return view('admin.church-members', ['members'=>$members]);
    });


