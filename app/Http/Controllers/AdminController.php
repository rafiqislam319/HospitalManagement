<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\CssSelector\Node\Specificity;

class AdminController extends Controller
{
    public function addDoctor()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                return view('admin.doctor.doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
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
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $appointmets = Appointment::all();
                return view('admin.admin.appointment', compact('appointmets'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
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

    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('admin.admin.doctors', compact('doctors'));
    }


    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->back();
    }


    public function updateDoctor($id)
    {
        $doctor = Doctor::find($id);

        // $specialities = ['family_physician', 'cardiologist', 'medicine']; //manually data set

        // Dynamically Retrieve all the distinct specialities from the Doctor model's specialities column.
        $specialities = Doctor::distinct()->pluck('speciality')->toArray();



        //if i would have  comma separated value like ("cardiologist, medicine") then i had to do following code
        // Split the speciality values into an array
        // $specialities = explode(',', $doctor->speciality);

        // Trim any whitespace from the array values
        // $specialities = array_map('trim', $specialities);


        return view('admin.admin.editDoctor', compact('doctor', 'specialities'));
    }

    public function updateDoctorData(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'speciality' => 'required|string|max:255',
            'room' => 'required|string|max:10',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $doctor = Doctor::find($id);

        // Update doctor
        $doctor->name = $validatedData['name'];
        $doctor->phone = $validatedData['phone'];
        $doctor->speciality = $validatedData['speciality'];
        $doctor->room = $validatedData['room'];

        // Upload image if provided
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->file->move('doctor_image', $imageName);
                $doctor->image = $imageName;
            }
        }

        $doctor->save();

        Alert::success('successfull', 'Doctor updated Successfully');
        return redirect()->back();
    }


    public function emailView($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                $data = Appointment::find($id);
                return view('admin.admin.emailForm', compact('data'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function sendEmail(Request $request, $id)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];
        Notification::send($data, new SendEmailNotification($details));
        Alert::success('successfull', 'Email Send Successfully');
        return redirect()->back();
    }
}
