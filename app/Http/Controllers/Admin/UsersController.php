<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getUsers()
    {
        $users = Users::latest()->get();
        return response()->json(["success" => true, 'users' => $users], 200);
    }


    public function displayUsersData()
    {
        //$users = Users::all(); // Fetch users from the database
        return view("admin.pages.user.user", );
    }

    public function createUsers(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);

            $user = Users::create([
                'username' => $validatedData['username'],
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Generate authentication token
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                "success" => true,
                "user" => $user,
                "token" => $token,
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Extract error messages
            $errors = $e->errors();

            if (isset($errors['email'])) {
                return response()->json([
                    "success" => false,
                    "message" => "User email already exists. Please choose a different email.",
                ], 422);
            }

            return response()->json([
                "success" => false,
                "message" => "Validation error",
                "errors" => $errors,
            ], 422);
        }
    }




}
