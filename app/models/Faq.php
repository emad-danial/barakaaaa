<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    //

    public $table="faq";
    public $timestamps = true;
    protected $fillable = array('question','answer');


}
