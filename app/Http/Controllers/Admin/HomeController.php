<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('admin.dashboard.dashboard');
    }


    public function proVersion($param)
    {
    	return abort('401', title_case($param));
    }
}
