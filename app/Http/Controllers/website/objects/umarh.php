<?php

namespace App\Http\Controllers\website\objects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\models\Umrah;
use Carbon\Carbon;
class umarh extends Controller
{
	public static function umarobject($umarId){
		$umar=DB::select('SELECT umrahs.id as id,
								 umrahs.name as name ,
						         umrahs.start_date as startDate,
						         umrahs.end_date as endDate,
						         umrahs.location as location,
						         umrahs.makkah_desciption as makkahDesciption,
						         umrahs.madina_desciption as madinaDesciption,
						         umrahs.rituals as rituals,
						         umrahs.flighting as flighting,
						         umrahs.package_type as packageType,
						         umrahs.from_city as fromCity,
						         umrahs.to_city as toCity,
						         umrahs.type as stopOverType,
						         umrahs.desciption as desciption,
 						         umrahs.is_offer as is_offer
						       
        		FROM umrahs WHERE umrahs.id=?',[$umarId]);
		/*make format to the start and end date*/
		$startDate = Carbon::create($umar[0]->startDate);
		$endData = Carbon::create($umar[0]->endDate);
		$duration=$endData->diffInDays($startDate)+1; 
		// make our array
		$umarh=[];
		$umarh['id']=$umar[0]->id;
		$umarh['name']=$umar[0]->name;
		$umarh['startDate']=$umar[0]->startDate;
		$umarh['endDate']=$umar[0]->endDate;
		$umarh['location']=$umar[0]->location;
		$umarh['makkahDesciption']=$umar[0]->makkahDesciption;
		$umarh['madinaDesciption']=$umar[0]->madinaDesciption;
		$umarh['startDateInformat']=$startDate->format('d \/ M');
		$umarh['endDateInformat']=$endData->format('d \/ M');
		$umarh['minPrice']=umarh::getMinPrice($umarId);
		$umarh['duration']=$duration;
		$umarh['calRate']=umarh::calRate($umarId);
		$umarh['packageType']=$umar[0]->packageType;
		$umarh['toCity']=$umar[0]->toCity;
		$umarh['fromCity']=$umar[0]->fromCity;
		$umarh['stopOverType']=$umar[0]->stopOverType;
		$umarh['desciption']=$umar[0]->desciption;
		$umarh['is_offer']=$umar[0]->is_offer;
		
		if($umar[0]->flighting !=NULL)
		$umarh['flighting']=$umar[0]->flighting;
	
		if($umar[0]->rituals !=NULL)
		$umarh['rituals']=$umar[0]->rituals;






		return [
			'umar'=>$umarh,
			'umarImages'=>umarh::getUmarImage($umarId),
			'packagesInclude'=>umarh::getPackageInclude($umarId),
			'pricing'=>umarh::getPricing($umarId),
			'rates'=>umarh::getRates($umarId),
			'umarhDays'=>umarh::getDays($umarId),
			'umarhDetails'=>umarh::getumarhDetails($umarId),
			'stopOver'=>umarh::getStopOver($umarId)

		];
	}
	public static  function getUmarImage($umarId){
		$images=DB::select('SELECT umarh_gallery.image as image from umarh_gallery
												 WHERE umarh_gallery.umrah_id=?',[$umarId]);
		$result=[]; foreach($images as $image) array_push($result,Request()->root().'/'.$image->image);
		return $result;
	}
	public static function getPackageInclude($umarId){
		$packagesInclude=DB::select('SELECT
					 packages_includes.icon as icon ,
	   				 packages_includes.name as packageName
      		 from ummar_haag_includes 
					INNER JOIN packages_includes on packages_includes.id=ummar_haag_includes.packages_includes_id
      			WHERE ummar_haag_includes.umarh_id=?',[$umarId]);
		return $packagesInclude;
	}
	public static function getPricing($umarId){
		$getPricing=DB::select('SELECT umarh_pricing.id as id ,
									   umarh_pricing.name as name,
								       umarh_pricing.number_per_room as numberPerRoom,
								       umarh_pricing.price as price
							   from umarh_pricing 
				WHERE umarh_pricing.umarh_id=?',[$umarId]);

        // chk if there offer 
		$chkIfthereAndiscount=Umrah::find($umarId)->is_offer;
		if($chkIfthereAndiscount !=NULL){
            foreach($getPricing as $key){
                $key->price=$key->price-(($chkIfthereAndiscount/100)*$key->price);
            }		    
		}


        

		return $getPricing;
	}
	public static function getRates($umarId){
		$getRates=DB::select('SELECT rates.id as id , 
	   								 rates.name as name,
       								 rates.message as message,
       								 rates.create_at as createAt,
       								 rates.user_id as user_id,
       								 rates.rate as rate
       			FROM rates WHERE rates.uamr_id=? and rates.is_approve="active"',[$umarId]);

		$umarRate=DB::select('SELECT SUM(rates.rate)/5 as count FROM rates WHERE rates.uamr_id=?',[$umarId]);

		

		return ['umarRate'=>$umarRate[0]->count,'rate'=>$getRates];
	}
	public static function getMinPrice($umarId){
		

		$getMinPrice=DB::select('SELECT MIN(umarh_pricing.price) as minPrice from
										 umarh_pricing WHERE umarh_pricing.umarh_id=?',[$umarId]);
		$minPrice=$getMinPrice[0]->minPrice;
		
	
		
		// chk if there an descount
		$chkIfthereAndiscount=Umrah::find($umarId)->is_offer;
		if($chkIfthereAndiscount !=NULL)  $minPrice=$getMinPrice[0]->minPrice-(($chkIfthereAndiscount/100)*$getMinPrice[0]->minPrice);
		


		return $minPrice;
	}
	public static function calRate($umarId){
		$calRate=DB::select('SELECT SUM(rates.rate)/count(rates.rate) as rate 
									from rates WHERE rates.is_approve="active" and rates.uamr_id=?',[$umarId]);

		return round($calRate[0]->rate,1);
	}
	public static function getDays($umarhId){
		$getDays=DB::select('SELECT umarh_days.id as id,
	  								umarh_days.name as name,
							        umarh_days.desciption as desciption,
							        umarh_days.day_number as dayNumber
    		from umarh_days WHERE umarh_days.umarh_id=? ORDER by umarh_days.id ASC',[$umarhId]);

		return $getDays;
	}
	public static function getumarhDetails($umarId){
		$getDetails=DB::select('SELECT umarh_details.included as included,
									   umarh_details.not_selected as notSelected,
								       umarh_details.important_notes as important_notes,
								       umarh_details.how_to_book as howToBook
		 FROM umarh_details WHERE umarh_details.umarh_id=?',[$umarId]);
		 if($getDetails !=null){
		     	return $getDetails[0];
		 }
	
	}

	public static function getStopOver($umarId){
		$getStopOver=DB::select('SELECT * FROM umarh_stop_over WHERE umarh_stop_over.umarh_id=?',[$umarId]);
		if(count($getStopOver) == 0)  return [];

		return $getStopOver[0];
	}

}
