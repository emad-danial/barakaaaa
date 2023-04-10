<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HotelsAmenities extends Model
{
    //

    public $table="hotel_amenities";
    public $timestamps = true;
    protected $fillable = array('hotel_id','amenities_id');

    public function hotel()
    {
        return $this->belongsTo('App\Model\Hotel');
    }


}
