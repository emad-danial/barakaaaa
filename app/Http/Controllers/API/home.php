<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AppSetting;
use App\Http\Controllers\website\homeController;
class home extends Controller
{
    public function index(){
    

	    $getTopUmar=homeController::getTopUmar();
	    $getTophajj=homeController::getTophajj();
	    $getStopOver=homeController::getStopOver();
	    $getTopVisit=homeController::getTopVisit();
	    $getTopHotels=homeController::getTopHotels();
	    $getTopRate=homeController::getTopRate();


    	return response()->json(
    		['status'=>"success",
    		 'getTopUmar'=>$getTopUmar,
    		 'getTophajj'=>$getTophajj,
    		 'getStopOver'=>$getStopOver,
    		 'getTopVisit'=>$getTopVisit,
    		 'getTopRate'=>$getTopRate,
    		 'getTopHotels'=>$getTopHotels
    	]);

    	

    }
    
    
    public function appSetting(){
        return response()->json(['status'=>'success','appSetting'=>AppSetting::all()->first()]);

    }
}
