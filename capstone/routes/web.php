<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use App\Http\Controllers\Auth\addChallengeController;
use App\Http\Controllers\challenges\sqlController;
use App\Http\Controllers\challenges\scrollController;
use App\Http\Controllers\challenges\crypt1Controller;
use App\Http\Controllers\challenges\pcapController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index'])->name('home');

Route::get('/challenges', [challengeController::class, 'index'])->name('challenge');
Route::post('/challenges', [challengeController::class, 'check']);

Route::get('/profile', [profileController::class, 'index'])->name('profile');

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store']);

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'log']);

Route::post('/logout', [logoutController::class, 'logout'])->name('logout');

Route::get('/add', [addChallengeController::class, 'checkadd'])->name('add');
Route::post('/add', [addChallengeController::class, 'add']);
Route::get('/delete', [addChallengeController::class, 'checkdel'])->name('delete');
Route::post('/delete', [addChallengeController::class, 'del']);

Route::get('/PreqlAndSql', [sqlController::class, 'index'])->name('sql');
Route::post('/PreqlAndSql', [sqlController::class, 'holocron']);

Route::get('/agent', [scrollController::class, 'index']);

Route::get('/cryptography', [crypt1Controller::class, 'index']);

Route::get('/pcap', [pcapController::class, 'index']);
?>
