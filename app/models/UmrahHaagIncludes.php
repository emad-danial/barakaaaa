<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UmrahHaagIncludes extends Model
{
    public $table="ummar_haag_includes";
    public $timestamps = true;
    protected $fillable = array('umarh_id', 'packages_includes_id');

    public function umrah()
    {
        return $this->belongsTo('App\Model\Umrah');
    }

}
