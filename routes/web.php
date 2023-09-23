<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration;

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

Route::get('/', [Registration::class, 'view'])->name('table'); //default page when the site load
Route::get('/register', [Registration::class, 'add'])->name('add'); //default page when the site load
Route::post('/register', [Registration::class, 'insert_data'])->name('insert'); //transfer the data by post method to the database in user table
Route::get('/delete/{id}', [Registration::class, 'delete'])->name('delete'); // call the function that delete the single row

Route::get('/page_2', [Registration::class, 'age'])->name('age'); //call the function that fatchin and retive the dat from database and show in the table_view_2.blade.php
Route::get('/page_3', [Registration::class, 'location'])->name('location'); //call the function that fatchin and retive the dat from database and show in the table_view_3.blade.php

Route::post('users/delete', [Registration::class, 'deleteMultiple'])->name('multipledelete'); // call the function that delete multiple rows in one click

Route::post('users/update', [Registration::class, 'multipleUpdate'])->name('multipleupdate'); // call the function that update the multiple rows
Route::get('user/excel',[Registration::class, 'excel'])->name('excel');
Route::post('user/import',[Registration::class, 'import'])->name('import');
Route::get('user/final/excel',[Registration::class, 'final_excel'])->name('final_excel');
Route::get('/page_4', [Registration::class, 'page_4'])->name('sheet'); //call the function that fatchin and retive the dat from database and show in the table_view_3.blade.php
Route::get('/page_5', [Registration::class, 'page_5'])->name('example'); //call the function that fatchin and retive the dat from database and show in the table_view_3.blade.php



