<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BrokerCommission extends Model
{
    public $table = "broker_commission";
    public $timestamps = true;
    protected $fillable = array('user_id', 'commission','company_name');

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
