<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->car == null)
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                "User's car" => [
                    'This user do not have car',
                ]
            ];
        }
        else
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                "User's car" => [
                    'name' => $this->car->name,
                    'model' => $this->car->model,
                ]
            ];
        }
        
    }
}
