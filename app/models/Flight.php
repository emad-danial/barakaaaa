<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
   
	public $table="flights";
    public $timestamps = true;
    protected $fillable = array('flight_name', 'flight_company', 'from_city', 'to_city', 'reservation_from', 'reservation_to','description','image', 'price','price_ch','is_offer','meta_description','meta_title','meta_keywords');

}
