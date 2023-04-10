<?php

namespace App\Http\Controllers\website\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use URL;
class evisaObject extends Controller
{
    public static function evisaObject($evisaId){

    	 $getEvisa=DB::select('SELECT * FROM evisa WHERE evisa.id=?',[$evisaId]);
	     $evisaDetail=DB::select('SELECT * FROM evisa_detail WHERE evisa_detail.evisa_id=?',[$evisaId]);
	     
	     

	     $object= [
	     	'evisa'=>$getEvisa[0],
	     	'evisaDetail'=>$evisaDetail,

	     ];
	     
    	if($getEvisa[0]->status == "pending")
                    $object["completePayment"]=URL::to('/')."/evisa/step3/".$getEvisa[0]->id;
                
                
        return $object;

    }
}
