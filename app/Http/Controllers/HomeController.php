<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirects()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                return view('frontend.home.home');
            } else {
                return view('admin.admin.dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        return view('frontend.home.home');
    }
}
