<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $table="events";
    public $timestamps = true;
    protected $fillable = array('title', 'description','status');
    public function gallery()
    {
        return $this->hasMany('App\models\EventGallery', 'event_id');
    }


}
