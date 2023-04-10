<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    public $table="event_gallery";
    public $timestamps = true;
    protected $fillable = array('event_id', 'file','type');

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }
        
}
