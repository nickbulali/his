<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Payment extends JsonResource
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
            'amount'=>$this->amount,
            'status' => $this->status,
            'paid_by' => $this->paid_by,
           
        ];
    }
}
