<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrokerPaid extends Model
{
    public $table="broker_baid";
    public $timestamps = true;
    protected $fillable = array('user_id','check_number','value','created_at');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
