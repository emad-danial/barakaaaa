<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UmarhDay extends Model
{
		public $table="umarh_days";
		public $timestamps = true;

    protected $fillable = array('umarh_id', 'name','desciption','day_number');
}
