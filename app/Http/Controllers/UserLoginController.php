<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = Users::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(["success" => false, "message" => "Invalid email or password."], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(["success" => true, "user" => $user, "token" => $token], 200);
    }

    public function logout(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                $request->user()->tokens()->delete();
                return response()->json(['success' => true, 'message' => 'Logged out successfully']);
            }

            return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Logout failed'], 500);
        }
    }

}
