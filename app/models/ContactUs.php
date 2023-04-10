<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $table="contact_us";
    public $timestamps = true;
    protected $fillable = array('user_id','name','phone','email','message');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
