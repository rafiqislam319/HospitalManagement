<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

    public function appointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'doctor' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        $appointment = new Appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctor;
        $appointment->phone = $request->phone;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';

        if (Auth::id()) {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message', 'Appointment has created successfully, we will contact you soon mann');
    }

    public function myappointment(){

        if(Auth::id()){

                $userId = Auth::id();
                $appointInfos = Appointment::where('user_id', $userId)->get();
            return view('frontend.home.appointment', compact('appointInfos'));

        }else{
            return redirect()->back();
        }

        
    }

    public function cancelappointment($id){

        $appointment = Appointment::find($id);
        if($appointment->delete()){
        return redirect()->back()->with('message', 'Appointment deleted successfully');
        }else{
            return redirect()->back();
        }


    }
}
