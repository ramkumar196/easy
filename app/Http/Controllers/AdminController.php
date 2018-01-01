<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /*admin Dashboard */
    public function dashboard()
    {
      return View::make('admin.pages.dashboard');
    }
}
