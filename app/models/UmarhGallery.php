<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UmarhGallery extends Model
{
    public $table="umarh_gallery";
    public $timestamps = true;
    protected $fillable = array('umrah_id', 'image');

    public function umrah()
    {
        return $this->belongsTo('App\Model\Umrah');
    }
        
}
