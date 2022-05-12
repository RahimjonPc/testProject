<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RemoveUserFromCarResource extends JsonResource
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
            'message' => $this->name.' '.$this->model.' теперь свободно!',
            'id' => $this->id,
            'name' => $this->name,
            'model' => $this->model,
        ];
    }
}
