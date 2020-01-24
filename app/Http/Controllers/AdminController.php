<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard (){
                // view( directory.file )
        return view('admin.dashboard');
    }

    public function __construct() {
        $this -> middleware('auth');
    }
}
