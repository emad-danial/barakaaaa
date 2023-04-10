<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackagesOrdersPersons extends Model
{
    public $table="orders_persons";
    public $timestamps = true;
    protected $fillable = array('order_package_id', 'first_name', 'last_name', 'age','gender','passport');

    public function PackagePrder()
    {
        return $this->belongsTo('App\models\PackagesOrders');
    }
}
