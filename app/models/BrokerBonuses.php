<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrokerBonuses extends Model
{
    public $table="broker_bonuses";
    public $timestamps = true;
    protected $fillable = array('user_id','order_id','order_type','commission');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
