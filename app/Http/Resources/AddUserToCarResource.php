<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddUserToCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'Пользователь '.$this->user->name.' успешно приклеплен к машине '.$this->name,
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
