<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $table="hotels";
    public $timestaps=false;
    protected $fillable = array('name','duration','city','mobile','description','location','address','availble_tickets','book_now_img','view_count','meta_description','meta_title','meta_keywords');
}
