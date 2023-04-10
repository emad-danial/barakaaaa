<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OrderHotels extends Model
{
    public $table="order_hotel";
    public $timestamps = true;
    protected $fillable = array('user_id','hotel_room_id','hotel_id','status','reserve_to','reserve_from','number_persons');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Hotel(){
        return $this->belongsTo('App\models\Hotel', 'hotel_id');
    }
    public function Room(){
        return $this->belongsTo('App\models\HotelRooms', 'hotel_room_id');
    }



}
