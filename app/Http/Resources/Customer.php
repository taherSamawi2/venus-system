<?php

namespace App\Http\Resources;

use App\Http\Resources\Tag as TagResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Contact as ContactResource;
use App\Http\Resources\Group as GroupResource;
use App\Http\Resources\Project as ProjectResource;

class Customer extends JsonResource
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
            'company' => $this->company,
            'companyPhone' => $this->companyPhone,
            'website' => $this->website,
            'currency' => $this->currency,
            'address' => $this->address,
            'country' => $this->country,
            'city' => $this->city,
            'state' => $this->state,
            'zipCode' => $this->zipCode,
            'dateCreated' => $this->dateCreated,
            'groups' =>  GroupResource::collection($this->groups),
            'contacts' => ContactResource::collection($this->contacts),
            'projects' => ProjectResource::collection($this->projects),

        ];
    }
}
