<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
         return
        [
            'id' => $this->id,
            'invoice_id' => $this->invoice_id,
            'status' => $this->status,
            'requested_by' => $this->requested_by,
            'charge_sheet_id' =>$this->charge_sheet_id,
            
        ];
    }
}
