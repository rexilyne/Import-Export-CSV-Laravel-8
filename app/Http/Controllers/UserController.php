<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function destroy() {
        DB::table('users')->delete();
        return redirect()->back();
    }
}
