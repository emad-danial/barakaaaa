<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UmarhDetail extends Model
{
    public $table = "umarh_details";
    public $timestamps = true;
    protected $fillable = array('umarh_id', 'included', 'not_selected', 'important_notes', 'how_to_book');

    public function umrah()
    {
        return $this->belongsTo('App\Model\Umrah');
    }


}
