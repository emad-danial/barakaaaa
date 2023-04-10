<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FlightsOrders extends Model
{
    public $table="user_flight";
    public $timestamps = true;
    protected $fillable = array('user_id','flight_id','num_of_adults','num_of_child','status');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Flight(){
        return $this->belongsTo('App\models\Flight', 'uamr_id');
    }



}
