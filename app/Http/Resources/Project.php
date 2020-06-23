<?php

namespace App\Http\Resources;
use App\Http\Resources\Tag as TagResource;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'name' => $this->name,
            'description' => $this->email,
            'status' => $this->status,
            'totalRate' => $this->totalRate,
            'estimatedHours' => $this->estimatedHours,
            'customer' => $this->customer,
            'tags' => TagResource::collection($this->tags),
            'dateStart' => $this->dateStart,
            'deadline' => $this->deadline,
        ];
    }

}
