<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    public $table="hotel_rooms";
    public $timestamps = true;
    protected $fillable = array('name','includes','maxinum', 'hotel_id','price','room_image','from_date','to_date');

    public function hotle()
    {
        return $this->belongsTo('App\Model\Hotel');
    }
        
}
