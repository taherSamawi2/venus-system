<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\Models\Media;

class CustomerContacts extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded=['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function setPasswordAttribute()
    {
        $this->attributes['password'] = Hash::make(request()->password);
    }


    protected $hidden = [
        'password'
    ];
}
