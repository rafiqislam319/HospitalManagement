<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function addDoctor()
    {
        //return 1;
        return view('admin.doctor.doctor');
    }
    public function saveDoctor(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'speciality' => 'required|string|max:255',
            'room' => 'required|string|max:10',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $doctor = new Doctor();
        $doctors = '';

        // Upload image

        $image = $request->file;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('doctor_image', $imageName);
        $doctor->image = $imageName;

        // Create doctor
        $doctor->name = $validatedData['name'];
        $doctor->phone = $validatedData['phone'];
        $doctor->speciality = $validatedData['speciality'];
        $doctor->room = $validatedData['room'];
        $doctor->save();
        if ($doctor->save()) {
            Alert::success('successfull', 'Doctor save Successfully');
            return redirect()->back();
        }


        //return redirect()->back();

        // Redirect to doctors page
        //return redirect()->with('success', 'Doctor created successfully.');
    }

    public function viewappointment()
    {
        $appointmets = Appointment::all();
        return view('admin.admin.appointment', compact('appointmets'));
    }

    public function approveAppointment($id)
    {
        $appointmet = Appointment::find($id);
        $appointmet->status = 'Approved';
        $appointmet->save();
        return redirect()->back();
    }

    public function cancelAppointment($id)
    {
        $appointmet = Appointment::find($id);
        $appointmet->status = 'Cancel';
        $appointmet->save();
        return redirect()->back();
    }
}
