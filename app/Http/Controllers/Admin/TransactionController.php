<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\Doctors;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function viewAppointments()
    {
       $users = Users::with('appointments.appointment_status')->get();
      // dd($users);
      //return view('admin.pages.user-appointments', compact('users'));
      return response()->json(["success" => true, 'users' => $users], 200);
    }


    public function displayAppointmentDataUsingJS()
    {
       // $users = Users::get();
       $users = Users::with('appointments.appointment_status')->get();

       return response()->json(["success" => true, 'users' => $users], 200);
    }

    public function displayDoctorsDataUsingJS()
{
    // // try {
        $doctors = Doctors::latest()->get(); // Fetch all doctors
        return response()->json([
            'success' => true,
            'doctors' => $doctors,
        ]);
    // } catch (\Exception $e) {
        // return response()->json([
        //     'success' => false,
        //     'message' => $e->getMessage(),
        // ], 500);
    }
}


