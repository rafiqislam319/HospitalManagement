<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirects()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {
                $doctors = $this->doctorData();
                return view('frontend.home.home', compact('doctors'));
            } else {
                return view('admin.admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {

        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctors = $this->doctorData();
            return view('frontend.home.home', compact('doctors'));
        }
    }

    //has used to reduce the redundancy of the code
    private function doctorData()
    {
        return Doctor::all();
    }
}
