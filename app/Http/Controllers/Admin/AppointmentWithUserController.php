<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use App\Models\Doctors;
use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AppointmentWithUserController extends Controller
{
    public function viewUsersAppointments()
    {
      return view('admin.pages.appointments.usersAppointments');
    }


    public function displayAppointmentDataUsingJS()
    {

        $users = Users::with([
            'appointments' => function ($query) {
                $query->latest();
            },
            'appointments.doctor',
            'appointments.appointmentStatus'
        ])->get();

        \Log::info('Fetched Appointment Data:', ['users' => $users]);

        return response()->json(["success" => true, 'users' => $users], 200);
    }


    public function getAvailableDoctors(Request $request)
    {
        $appointmentDateTime = $request->input('appointment_date');

        // Get doctors who are already booked at the selected date
        $bookedDoctorIds = Appointments::where('date_time', $appointmentDateTime)
            ->pluck('doctor_id')
            ->toArray();

        // Fetch only doctors who are not booked
        $availableDoctors = Doctors::whereNotIn('id', $bookedDoctorIds)->get();

        return response()->json([
            'success' => true,
            'available_doctors' => $availableDoctors
        ]);
    }

    public function storeAppointment(Request $request)
    {
        \Log::info('Incoming Appointment Data:', $request->all());

        try {
            // ✅ Validate appointment details
            $request->validate([
                'appointment_date' => 'required|date|after_or_equal:today',
                'appointment_name' => 'required|string|max:255',
                'appointment_type' => 'required|string|in:checkup,emergency,follow-up,consult',
                'doctor_id' => 'required|exists:doctors,id',
                'user_id' => 'required|exists:users,id',
                'appointment_status_id' => 'nullable|exists:appointment_statuses,id'
            ]);

            // ✅ Create appointment
            $appointment = Appointments::create([
                'appointment_name' => $request->appointment_name,
                'date_time' => Carbon::parse($request->appointment_date),
                'appointment_type' => $request->appointment_type,
                'doctor_id' => $request->doctor_id,
                'status' => 'Pending',
                'user_id' => $request->user_id,
                'appointment_status_id' => 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Appointment created successfully!',
                'appointment' => $appointment
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Error creating appointment:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Failed to book appointment.', 'error' => $e->getMessage()], 500);
        }
    }

    public function getUserAppointments()
    {
        $user = auth()->user(); // Get the authenticated user via token

        if (!$user) {
            return response()->json(["success" => false, "message" => "Unauthorized"], 401);
        }

        // ✅ Fetch only appointments belonging to this user
        $appointments = $user->appointments()->with(['doctor', 'appointmentStatus'])->latest()->get();

        if ($appointments->isEmpty()) {
            return response()->json(["success" => true, "message" => "No appointments found", "appointments" => []], 200);
        }

        return response()->json(["success" => true, "appointments" => $appointments], 200);
    }

    public function deleteAppointment($id)
    {
        error_log("Deleting appointment with ID: " . $id);

        $appointment = Appointments::find($id);

        if (!$appointment) {
            return response()->json(["success" => false, "message" => "Appointment not found"], 404);
        }

        $appointment->delete();
        return response()->json(["success" => true, "message" => "Appointment deleted successfully"], 200);
    }



}
