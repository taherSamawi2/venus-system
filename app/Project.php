<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=['id'];

    public function customer()
    {
        return  $this->belongsTo(Customer::class);
    }

    public function tags()
    {
        return  $this->belongsToMany(Tag::class);
    }

    public function Members()
    {
        return  $this->belongsToMany(Member::class);
    }


}
