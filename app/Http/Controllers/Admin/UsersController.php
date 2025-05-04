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


        public function getUsersById($id) {
            $users = Users::find($id);

            if (!$users) {
                return response()->json(["success" => false, "message" => "User not found"], 404);
            }

            return response()->json(["success" => true, "user" => $users], 200);
        }

        public function updateUser(Request $request, $id)
        {
        $user = Users::find($id);

            //  Validate only provided fields, allow partial updates
            $request->validate([
                'username' => 'sometimes|string|max:255',
                'firstname' => 'sometimes|string|max:255',
                'lastname' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:users,email,' . $id,
                'password' => 'nullable|min:8',
            ]);

            //  Update only the fields present in the request
            $user->fill($request->only(['username', 'firstname', 'lastname', 'email']));

            //  Secure password update if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json(["success" => true, "message" => "User updated successfully", "user" => $user], 200);
        }


        public function deleteUser($id)
        {
            $user = Users::find($id);

            if (!$user) {
                return response()->json(["success" => false, "message" => "User not found"], 404);
            }

            $user->delete();

            return response()->json(["success" => true, "message" => "User deleted successfully"], 200);
        }

}
