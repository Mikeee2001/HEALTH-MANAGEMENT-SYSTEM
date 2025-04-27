<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{

    public function getDoctorById($id) {
        $doctor = Doctors::find($id);

        if (!$doctor) {
            return response()->json(["success" => false, "message" => "Doctor not found"], 404);
        }

        return response()->json(["success" => true, "doctor" => $doctor], 200);
    }

    public function viewDoctors()
    {
        $doctor = Doctors::all();
        // dd($users);
        return view('admin.pages.doctors.doctors');
        //return response()->json(["success" => true, 'doctors' => $doctor], 200);
    }

    public function addDoctor(Request $request)
    {
        // firstname: fname.val().trim(),
        // lastname: lname.val().trim(),
        // specialty: specialty.val().trim(),
        // qualification: qualification.val().trim(),

        // Apply validation rules
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'doctor_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('doctor_image')) {
            $imagePath = $request->file('doctor_image')->store('public/doctor_images');
            $validatedData['doctor_image'] = str_replace('public/', '', $imagePath);
        }

        // Proceed with storing the validated data
        $addDoctor = Doctors::create($validatedData);

        return response()->json(["success" => true, "doctors" => $addDoctor], 200);
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctors::find($id);

        if (!$doctor) {
            return response()->json(["success" => false, "message" => "Doctor not found"], 404);
        }

        $doctor->delete();

        return response()->json(["success" => true, "message" => "Doctor deleted successfully"], 200);
    }

    public function updateDoctor(Request $request, $id)
    {
        // Fetch or create doctor record
        $doctor = Doctors::updateOrCreate(
            ['id' => $id],
            [
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'specialty' => $request->specialty,
                'qualification' => $request->qualification,
            ]
        );

        // Handle doctor image upload
        if ($request->hasFile('doctor_image')) {
            $imagePath = $request->file('doctor_image')->store('public/storage/doctor_images');
            $doctor->doctor_image = basename($imagePath);
            $doctor->save(); // Save the updated record with the image
        }

        return response(["message" => "Doctor updated successfully"], 200);
    }


}
