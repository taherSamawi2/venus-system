<?php

namespace App\Http\Resources;
use App\Http\Resources\Tag as TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Contact extends JsonResource
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
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'position' => $this->position,
            'email'    => $this->email,
            'password' => $this->password,
            'primaryContact' => $this->primaryContact,
            'contactNumber' => $this->contactNumber,
            'lastLogin' => $this->lastLogin,
            'customer' => $this->customer,
        ];
    }
}
