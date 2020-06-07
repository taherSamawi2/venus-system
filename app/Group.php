<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded=[];

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }
}
