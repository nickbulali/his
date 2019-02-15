<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChargeSheet extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return
        [
            'id' => $this->id,
            'test_type_id' => $this->test_type_id,
            'cost' => $this->cost,
            'covered_by' => $this->covered_by,
           
        ];
    }
}
