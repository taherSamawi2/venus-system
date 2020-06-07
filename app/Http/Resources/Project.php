<?php

namespace App\Http\Resources;

use App\Http\Resources\Customer as CustomerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);

//        $project_thumbs="";
//        foreach ( $this->getMedia('thumbnail_project') as  $thumb){
//            $project_thumbs = $thumb->getFullUrl();
//        }
//
//        $project_photos=[];
//        foreach ( $this->getMedia('project_photos') as  $photo){
//            $project_photos[] = $photo->getUrl();
//        }

        return [
            'id'                     => $this->id,
            'name'                   => $this->name,
//            'client'                 => CustomerResource::collection($this->Customer),
//            'thumbnail'              => $project_thumbs,
//            'project_photos'         =>  $project_photos,
            'date_start'             => $this->date_start,
            'date_end'               => $this->date_end,
        ];
    }

}
