<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PackageInclude extends Model
{
    //

    public $table="packages_includes";
    public $timestamps = true;
    protected $fillable = array('name', 'icon');


}
