<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $table="rates";
    public $timestamps = false;

 protected $fillable = array('uamr_id','hotel_id','name','mobile','message','rate','is_approve');


  
    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function umarh(){
        return $this->belongsTo('App\models\Umrah', 'uamr_id');
    }
    
    public function hotel(){
        return $this->belongsTo('App\models\Hotel', 'hotel_id');
    }

}
