<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function toDisplayPage()
    {
        $doctors = Doctors::latest()->get();
        // return response()->json([
        //     'success' => true,
        //     'doctors' => $doctors,
        // ]);
        return view('tableView');
    }

    public function displayData()
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
