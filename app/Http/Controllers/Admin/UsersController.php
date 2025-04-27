<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function getUsers()
    {
        $users = Users::all();
        return response()->json(["success" => true, 'users' => $users], 200);
    }

    // public function displayUsersData()
    // {
    //     return view("admin.pages.user.user",);
    // }
    public function displayUsersData()
{
    //$users = Users::all(); // Fetch users from the database
    return view("admin.pages.user.user", );
}


}
