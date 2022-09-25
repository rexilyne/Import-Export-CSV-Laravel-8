<?php

use App\Exports\UsersExport;
use App\Http\Controllers\UserController;
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
    // Jika ingin menyimpan file ke dalam storage
    // $fileName = time().'_'.request()->file('file')->getClientOriginalName();
    // request()->file('file')->storeAs('reports', $fileName, 'public');

    Excel::import(new UsersImport, request()->file('file'));
    return redirect()->back()->with('success', 'Data Imported Successfully');
});

Route::get('export-csv', function(){
    return Excel::download(new UsersExport, 'users.csv');
});

Route::controller(UserController::class)->group(function() {
    Route::get('delete-data', 'destroy');
});
