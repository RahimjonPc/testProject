<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    public function getCars()
    {
        $cars = Car::with('user')->get();

        $data = [
            'success' => true,
            'data' => $cars,
        ];

        return response()->json($data, 200);
    }

    public function AddUserToCar($id, Request $request)
    {
        $users = User::all();
        $cars = Car::all();
        $car = Car::find($id);

        foreach($cars as $item)
        {
            if($item->user_id == $request->user_id || $car->user_id != null)
            {
                $data = [
                    'success' => false,
                    'message' => 'Или пользователь уже имеет машину или машина уже забронировано.'
                ];
                return response()->json($data, 200);
            }
        }
        
        $car->user_id = $request->user_id;
        $car->save();

        $data = [
            'success' => true,
            'message' => 'Пользователь '.$car->user->name.' успешно приклеплен к машине '.$car->name,
            'data' => $car,
        ];

        return response()->json($data, 200);
    }
}
