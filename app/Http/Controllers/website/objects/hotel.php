<?php

namespace App\Http\Controllers\website\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\website\objects\hotel;
class hotel extends Controller
{
	public static function hotelObject($hotelId){
		$hotel=DB::select('SELECT * FROM hotels WHERE hotels.id=?',[$hotelId]);

		$hotelObject=[
			'id'=>$hotel[0]->id,
			'name'=>$hotel[0]->name,
			'duration'=>$hotel[0]->duration,
			'city'=>$hotel[0]->city,
			'description'=>$hotel[0]->description,
			'location'=>$hotel[0]->location,
			'availbleTickets'=>$hotel[0]->availble_tickets,
			'address'=>$hotel[0]->address,
			'hotelImages'=>hotel::getImage($hotelId),
			'getAmenities'=>hotel::getAmenities($hotelId),
			'getRooms'=>hotel::getRooms($hotelId),
			'city'=>$hotel[0]->city,
			'rate'=>hotel::calRate($hotelId),
			'getRates'=>hotel::getRates($hotelId),
			'mobile'=>$hotel[0]->mobile,
			'meta_keywords'=>$hotel[0]->meta_keywords,
			'meta_title'=>$hotel[0]->meta_title,
			'meta_description'=>$hotel[0]->meta_description,
			'minPrice'=>hotel::getMinPrice($hotelId),
			'bookNowImg'=>$hotel[0]->book_now_img
			

		];


		return $hotelObject;

	}

	public static function getImage($hotelId){
		$galleryImage=DB::select('SELECT * FROM hotel_gallery WHERE hotel_gallery.hotel_id=?',[$hotelId]);
		$result=[];  foreach($galleryImage as $key) array_push($result,$key->image); 
		return $result;
	}

	public static function getAmenities($hotelId){
		$amenities=DB::select('SELECT hotel_amenities.amenities_id as amenitiesId,
									   amenities.name 
			 FROM hotel_amenities 
					   INNER JOIN amenities on amenities.id=hotel_amenities.amenities_id
					   INNER JOIN hotels ON hotels.id=hotel_amenities.hotel_id
			WHERE hotel_amenities.hotel_id=?',[$hotelId]);
		return $amenities;
	}

	public static function getRooms($hotelId){
		$result=[];
		$rooms=DB::select('SELECT * from hotel_rooms WHERE hotel_rooms.hotel_id=?',[$hotelId]);
		
		foreach ($rooms as $key){

			$room=[
				"id"=>$key->id,
				"name"=>$key->name,
				"includes"=>$key->includes,
				"maxinum"=>$key->maxinum,
				"price"=>$key->price,
				"updated_at"=>$key->updated_at,
				"created_at"=>$key->created_at,
				"hotel_id"=>$key->hotel_id,
				"room_image"=>$key->room_image,
				"from_date"=>$key->from_date,
				"to_date"=>$key->to_date
			];



			if( strtotime($key->from_date) <= strtotime(date('Y-m-d')) && 
				strtotime($key->to_date) >= strtotime(date('Y-m-d')) )
					$room['isAvaliable']=true;  else $room['isAvaliable']=false; 

	

				array_push($result,$room);

		}
		return $result;
	}


	public static function calRate($hotelId){
		$calRate=DB::select('SELECT SUM(rates.rate)/count(rates.rate) as rate 
									from rates WHERE rates.is_approve="active" and rates.hotel_id=?',[$hotelId]);

		return round($calRate[0]->rate,1);
	}


	public static function getRates($hotelId){
			$getRates=DB::select('SELECT rates.id as id , rates.name as name,
	       								 rates.message as message, rates.create_at as createAt,
	       								 rates.user_id as user_id,
	       								 rates.rate as rate
	       			FROM rates WHERE rates.hotel_id=? and rates.is_approve="active"',[$hotelId]);
			return $getRates;
	}

	public static function getMinPrice($hotelId){

		$getMinPrice=DB::select('SELECT min(hotel_rooms.price) as minPrice  FROM hotel_rooms WHERE hotel_rooms.hotel_id=?',[$hotelId]);
	
		return $getMinPrice[0]->minPrice;
	}

}
