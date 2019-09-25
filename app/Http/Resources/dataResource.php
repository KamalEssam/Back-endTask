<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class dataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
        'key'               =>$this->id,
        'last_name'             => $this->last_name,
        'first_name'            => $this->first_name,
        'phone_number'          => $this->phone_number,
        'counrtyCode'           => $this->countryCode,
        //'gender'              => $this->word,
        'avater'                => $this->avater,
        'birth_date'            => $this->date         ,
        'email'                 => $this->email,
        ];
    }
}
