<?php

namespace App\Http\Resources;

use App\Http\Resources\Customer as CustomerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

}
