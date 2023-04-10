<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UmarhStopOver extends Model
{
    public $table="umarh_stop_over";
    public $timestamps = true;
    protected $fillable = array('umarh_id', 'city','start_date','end_date','description');

    public function umrah()
    {
        return $this->belongsTo('App\Model\Umrah');
    }

}
