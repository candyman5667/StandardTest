<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
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

//入力ページ
Route::get('/contact',[ContactsController::class,'index'])->name('contact.index');

//確認ページ
Route::post('contact/confirm',[ContactsController::class,'confirm'])->name('contact.confirm');


//送信完了ページ
Route::post('contact/thanks',[ContactsController::class,'send'])->name('contact.send');

//管理画面ページ
Route::get('contact/management', [ContactsController::class, 'manage'])->name('contact.manage');
Route::post('contact/management', [ContactsController::class, 'manage'])->name('contact.manage');
Route::get('contact/search', [ContactsController::class, 'search'])->name('contact.search');
Route::post('contact/search', [ContactsController::class, 'search'])->name('contact.search');
Route::post('contact/delete', [ContactsController::class, 'delete'])->name('contact.delete');