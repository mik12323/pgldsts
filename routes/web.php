<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

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

// Admin
// Route::group(['middleware'=> 'isLoggedIn'], function(){
//     Route::post('/tracking/project', [projectsController::class, 'trackProject'])->name('track-project');
//     Route::get('/tracking', [ProjectsController::class, 'trackView'])->name('tracking');
// });

// Route::prefix('admin')->middleware('alreadyLoggedIn')->group(function () {
//     Route::get('/login', [AuthController::class, 'loginView'])->name('login');
//     Route::get('/register', [AuthController::class, 'registerView'])->name('register');
// });

Route::get('/login', [AuthController::class, 'loginView'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/register', [AuthController::class, 'registerView'])->name('register')->middleware('alreadyLoggedIn');


// Guest
Route::get('/guest/tracking', [ProjectController::class, 'trackViewGuest'])->name('tracking-guest');
Route::post('/guest/tracking/project', [ProjectController::class, 'trackProjectGuest'])->name('track-project-guest');

// Admin
Route::post('/admin/tracking/project', [ProjectController::class, 'trackProjectAdmin'])->name('track-project-admin')->middleware('isLoggedIn');
Route::get('/admin/tracking', [ProjectController::class, 'trackViewAdmin'])->name('tracking-admin')->middleware('isLoggedIn');
Route::get('/admin/project/add', [ProjectController::class, 'projectAdd'])->name('project-add')->middleware('isLoggedIn');
Route::get('/projects', [ProjectController::class, 'projectView'])->name('project-view')->middleware('isLoggedIn');
Route::get('/profile', [AuthController::class, 'profileView'])->name('profile')->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('isLoggedIn');
Route::post('/admin/projects/time-in', [TransactionController::class, 'addTransaction'])->name('addTransaction')->middleware('isLoggedIn');
Route::post('/admin/projects/time-out', [TransactionController::class, 'timeOutButton'])->name('timeOutButton')->middleware('isLoggedIn');
Route::post('/projects-store', [ProjectController::class, 'projectStore'])->name('project-store')->middleware('isLoggedIn');

// AuthController
Route::get('/', [AuthController::class, 'homeView'])->name('home');




Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login-user');




// ProjectsController

Route::get('/messages', [ProjectController::class, 'messageView'])->name('messages');
