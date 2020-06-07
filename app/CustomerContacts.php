<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

class CustomerContacts extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded=[];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
