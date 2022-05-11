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

    public function AddCarToUser($id, Request $request)
    {
        $user = User::find($id);
        $user->car->user_id = $request->car_id;
        $user->save();

        $data = [
            'message' => 'Машина '.$user->car->name.' успешно приклеплен к пользователю '.$user->name,
            'data' => $user,
        ];

        return response()->json($data, 200);
    }

}
