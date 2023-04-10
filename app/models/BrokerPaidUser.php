<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrokerPaidUser extends Model
{
    public $table="user_to_broker_paid";
    public $timestamps = true;
    protected $fillable = array('order_id','broker_id','check_number','value','created_at');

    public function User(){
        return $this->belongsTo('App\User', 'broker_id');
    }


}
