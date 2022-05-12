<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Http\Resources\CarResource;
use App\Http\Resources\AddUserToCarResource;
use App\Http\Resources\RemoveUserFromCarResource;

class CarController extends Controller
{
    public function getCars()
    {
        $cars = Car::with('user')->get();

        return CarResource::collection($cars);
    }

    public function AddUserToCar($id, Request $request)
    {
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

        return new AddUserToCarResource($car);
        // return response()->json($data, 200);
    }

    public function removeUserFromCar($id, Request $request)
    {
        $car = Car::find($id);
        $car->user_id = null;
        $car->save();

        $data = [
            'success' => true,
            'message' => $car->name.' '.$car->model.' теперь свободно!',
            'data' => $car,
        ];
        
        return new RemoveUserFromCarResource($car);
        // return response()->json($data, 200);
    }
}
