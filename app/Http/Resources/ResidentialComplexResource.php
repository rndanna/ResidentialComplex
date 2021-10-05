<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResidentialComplexResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
//            'city' => new CityResource($this->city),
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
//            'district' => new DistrictResource($this->district),
            'img' => $this->img
        ];
    }
}
