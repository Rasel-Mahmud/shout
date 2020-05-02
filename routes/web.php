<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shout', [HomeController::class, 'home'])->name('shout');
Route::post('/savestatus', [HomeController::class, 'saveStatus'])->name('shout.save');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::post('/saveprofile', [HomeController::class, 'saveProfile'])->name('profile.save');
Route::get('/profile/{nickname}', [HomeController::class, 'profileTimeline'])->name('timeline');

Route::get('/shout/makefriend/{friendID}', [HomeController::class, 'makeFriend'])->name('shout.makefriend');
Route::get('/shout/unfriend/{friendID}', [HomeController::class, 'unFriend'])->name('shout.unfriend');
