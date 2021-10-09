<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'isAvailable' => $this->isAvailable,
            'count_rooms' => $this->count_rooms,
            'entrance' => $this->entrance,
            'square' => $this->square,
            'floor' => $this->floor,
            'price' => $this->price
        ];
    }
}
