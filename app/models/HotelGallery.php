<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HotelGallery extends Model
{
    public $table="hotel_gallery";
    public $timestamps = true;
    protected $fillable = array('image', 'hotel_id');

    public function hotle()
    {
        return $this->belongsTo('App\Model\Hotel');
    }
        
}
