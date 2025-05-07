<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function displayDoctorsDataUsingJS()
    {
   
        $doctors = Doctors::latest()->get(); // Fetch all doctors
        return response()->json([
            'success' => true,
            'doctors' => $doctors,
        ]);

    }

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
            $imagePath = $request->file('doctor_image')->store('public/doctor_image');
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
        // Validate the incoming request, allowing fields to be optional
        $validatedData = $request->validate([
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'doctor_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch the doctor record
        $doctor = Doctors::findOrFail($id);

        // Conditionally update each field if it is present in the request
        if ($request->has('firstname')) {
            $doctor->firstname = $validatedData['firstname'];
        }

        if ($request->has('lastname')) {
            $doctor->lastname = $validatedData['lastname'];
        }

        if ($request->has('specialty')) {
            $doctor->specialty = $validatedData['specialty'];
        }

        if ($request->has('qualification')) {
            $doctor->qualification = $validatedData['qualification'];
        }

        // Handle doctor image upload
        if ($request->hasFile('doctor_image')) {
            // Delete the old image if it exists
            if ($doctor->doctor_image) {
                \Storage::delete('public/doctor_image/' . $doctor->doctor_image);
            }

            // Store new image
            $imagePath = $request->file('doctor_image')->store('public/doctor_image');
            $doctor->doctor_image = str_replace('public/', '', $imagePath);
        }

        // Save updated doctor information
        $doctor->save();

        return response()->json([
            "message" => "Doctor updated successfully",
            "doctor" => $doctor
        ], 200);
    }


}
