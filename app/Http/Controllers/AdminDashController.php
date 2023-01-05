<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    public function Index(){
        return view('admin-panel.dashboard');
    }
}
