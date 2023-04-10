<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Umrah extends Model
{
   
	public $table="umrahs";
    public $timestamps = true;
    protected $fillable = array('name', 'location', 'makkah_desciption', 'madina_desciption', 'start_date', 'end_date','package_type','is_active', 'type','from_city','to_city','is_offer','flighting','rituals','meta_description','meta_title','meta_keywords');

 
    public function umarhGalleries()
    {
        return $this->hasMany('App\models\UmarhGallery', 'umrah_id');
    }

    public function umarhPricies()
    {
        return $this->hasMany('App\models\UmrahPricing','umarh_id');
    }

    public function umarhDetails()
    {
        return $this->hasMany('App\models\UmarhDetail', 'umarh_id');
    }

    public function umrahHaagIncludes()
    {
        return $this->hasMany('App\models\UmrahHaagIncludes', 'umarh_id');
    }
    public function umarhStopOver()
    {
        return $this->hasOne('App\models\UmarhStopOver', 'umarh_id');
    }

    public function umarhDays()
    {
        return $this->hasMany('App\models\UmarhDay', 'umarh_id');
    }

}
