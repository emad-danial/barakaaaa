<?php

namespace App\Http\Controllers\website\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class flight extends Controller
{
	public static function flightObject($flightId){
		$flight=DB::select('SELECT * FROM flights where flights.id=?',[$flightId]);
		$flightObject=[];

		$flightObject['id']=$flight[0]->id;
		$flightObject['flightName']=$flight[0]->flight_name;
		$flightObject['flightCompany']=$flight[0]->flight_company;
		$flightObject['from']=$flight[0]->from_city;
		$flightObject['to']=$flight[0]->to_city;
		$flightObject['reservationFrom']=$flight[0]->reservation_from;
		$flightObject['reservationTo']=$flight[0]->reservation_to;
		$flightObject['meta_keywords']=$flight[0]->meta_keywords;
		$flightObject['meta_title']=$flight[0]->meta_title;
		$flightObject['meta_description']=$flight[0]->meta_description;
		$flightObject['description']=$flight[0]->description;
		$flightObject['image']=Request()->root().'/'.$flight[0]->image;
		if($flight[0]->is_offer !=NULL) {
			$flightObject['priceAdult']=$flight[0]->price-(($flight[0]->is_offer/100)*$flight[0]->price);
			$flightObject['priceChild']=$flight[0]->price_ch-(($flight[0]->is_offer/100)*$flight[0]->price_ch);
			$flightObject['isOffer']=$flight[0]->is_offer;
		}else{
			$flightObject['priceAdult']=$flight[0]->price;
			$flightObject['priceChild']=$flight[0]->price_ch;
			$flightObject['isOffer']=false;
		}


		return $flightObject;

	}
}
