<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        // dd(auth()->user());
        // return view('auth.register');
        return view('dashboard');
    }

    public function store(Request $request)
    {
        return route('dashboard');
    }
}
