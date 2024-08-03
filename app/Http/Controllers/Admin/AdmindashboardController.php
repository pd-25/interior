<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmindashboardController extends Controller
{
    function dashboard(){
        return view('admin.dashboard.dashboard');
    }
}
