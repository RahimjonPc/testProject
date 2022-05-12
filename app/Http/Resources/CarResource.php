<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->user == null)
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'model' => $this->model,
                "Car's user detail" => [
                    'This car is avaible',
                ]
            ];
        }
        else
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'model' => $this->model,
                "Car's user detail" => [
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ]
            ];
        }
    }
}
