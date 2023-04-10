<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AppGallery extends Model
{
    //

    public $table="app_gallery";
    public $timestamps = true;
    protected $fillable = array('image', 'type');


}
