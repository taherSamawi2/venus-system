<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function contacts()
    {
        return $this->hasMany(customerContacts::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

}
