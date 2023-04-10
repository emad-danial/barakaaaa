<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmrahPricing extends Model
{
    public $table="umarh_pricing";
    public $timestamps = true;
    protected $fillable = array('umarh_id', 'name', 'number_per_room', 'price');

    public function umrah()
    {
        return $this->belongsTo('App\Model\Umrah');
    }
}
