<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::with('car')->get();

        $data = [
            'success' => true,
            'data' => $users,
        ];

        return response()->json($data, 200);
    }
}
