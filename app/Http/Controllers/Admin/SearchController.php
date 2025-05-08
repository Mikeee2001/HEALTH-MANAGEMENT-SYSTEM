<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchDoctors(Request $request)
    {
        $searchTerm = $request->query('query');

        $doctors = Doctors::where('firstname', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('lastname', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('specialty', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('qualification', 'LIKE', "%{$searchTerm}%")
                        ->get();

        return response()->json(["success" => true, "doctors" => $doctors]);
    }

}
