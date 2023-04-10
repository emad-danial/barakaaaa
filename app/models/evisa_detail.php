<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class evisa_detail extends Model
{
	public $table="evisa_detail";
	public $timestamps=false;
	 protected $fillable = array('evisa_id','passport_type','passport_photo','photo');
}
