<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::with('car')->get();
        return UserResource::collection($users);
    }
}
