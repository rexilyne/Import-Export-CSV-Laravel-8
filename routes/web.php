<?php

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', function () {
    return view('welcome', [
        'users' => User::all()
    ]);
});

Route::post('import', function () {
    Excel::import(new UsersImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
});
