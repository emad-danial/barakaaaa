<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PackagesOrders extends Model
{
    public $table="orders_package";
    public $timestamps = true;
    protected $fillable = array('user_id','package_pricing_id','status','contact_number','email','city_code','departure_date','return_date','is_flexible','prief_travel','travel_first','madina_stay','makkah_stay','budget_per_person','travel_alone','paid','remaining');

    public function User(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Umrah(){
        return $this->belongsTo('App\models\Umrah', 'package_pricing_id');
    }
    
    
    public function umrahPricing(){
        return $this->belongsTo('App\models\Umrah', 'package_pricing_id');
    }
    


}
