<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class evisa extends Model
{
	public $table="evisa";
	 protected $fillable = array('first_name','last_name','contact_number','email','status');

}
