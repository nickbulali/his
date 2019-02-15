<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Invoice extends JsonResource
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
            'invoice_no' => $this->invoice_no,
            'status' => $this->status,
            'total' => $this->total,
            'opened_by' =>$this->opened_by,
            'encounter_id'=>$this->encounter_id,
            'created_at'=>(string)$this->created_at->format('d/m/Y'),
        ];
    }
}
