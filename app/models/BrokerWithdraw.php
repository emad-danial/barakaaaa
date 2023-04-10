<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrokerWithdraw extends Model
{
    public $table="broker_withdraw";
    public $timestamps = true;
    protected $fillable = array('user_id','status','value');

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }


}
