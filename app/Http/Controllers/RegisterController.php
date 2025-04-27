<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('auth.register'); // Only allows admin registration
    }

    /**
     * Handle admin registration.
     */
    public function register(Request $request)
    {
        // Validate input data
        $attributes = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Check if the username already exists in the admins table
        if (Admin::where('username', $request->username)->exists()) {
            return back()->withErrors(['username' => 'This username is already taken. Please choose another one.']);
        }

        // Hash password
        $attributes['password'] = Hash::make($attributes['password']);

        // Create an admin account (users won't be registered here)
        $admin = Admin::create($attributes);

        // Log in the admin immediately after registration
        Auth::guard('web')->login($admin);

        return redirect()->route('dashboard')->with('success', 'Welcome, Admin!');
    }
}
