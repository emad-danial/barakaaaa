<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    //

    public $table="amenities";
    public $timestamps = true;
    protected $fillable = array('name');



}
