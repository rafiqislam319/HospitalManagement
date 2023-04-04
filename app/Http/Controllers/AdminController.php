<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

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


        return redirect()->back();

        // Redirect to doctors page
        //return redirect()->with('success', 'Doctor created successfully.');
    }
}
