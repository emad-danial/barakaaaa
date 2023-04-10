<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\website\objects\umarh;
use App\Http\Controllers\website\umrahPackageDetails;
use App\models\Umrah;
use Validator;
use App\models\Rate;
use Carbon\Carbon;
use Auth;
class umrahPackageDetails extends Controller
{


/**
 * [getPackage description]
 * @param  [type] the type of packages   umarh or hajj
 * @return [type]       array of object of umarh
 */
	public function getPackage($type){
		if($type == "umrah") 
			$plus=' umrahs.package_type="umar" ';
		elseif ($type == "hajj") 
			$plus=' umrahs.package_type="hajj" ';
		else return redirect('/');

			$getPackage=DB::select('SELECT umrahs.id as id from umrahs 
											WHERE umrahs.is_active="active" and '.$plus);
			$result=[]; foreach($getPackage as $key) array_push($result,umarh::umarobject($key->id));
			
		return view('website.packages',['type'=>$type,'packages'=>$result]);
	}

	/**
		this method to return to the package profile
	 * @param  [type] $umarhId   ==> for the umar id 
	 * @return [type]            ==>
	 */
	public function index($umarhId){
		$Umrah=Umrah::find($umarhId);
			if(!$Umrah  || $Umrah->is_active !="active")  return redirect('/');
		
		// increase the view count by one 	
		umrahPackageDetails::increaseViewCount($umarhId);

		$meta_title=$Umrah->meta_title;
		$meta_description=$Umrah->meta_description;
		$meta_keywords=$Umrah->meta_keywords;
		return view('website.umrah-package-details',['umarh'=>umarh::umarobject($umarhId),'meta_title'=>$meta_title,'meta_description'=>$meta_description,'meta_keywords'=>$meta_keywords]);
	}

/**
 * this to submit an rate to an package 
 * @param  Request $request [description]
 * @return [type]           [description]
 */
	public function submitRate(Request $request){
		
		$validate=Validator::make($request->all(),[
			'rateValue'=>'required|numeric',
			'packageId'=>'required|integer|exists:umrahs,id',
			'mobile'=>'required|numeric',
			'name'=>'required|min:3',
			'ratemessage'=>'required|min:3'
		]);
		if($validate->fails())  return back();

		$rate=new Rate();
		$rate->uamr_id=$request->packageId;
		$rate->name=$request->name;
		$rate->mobile=$request->mobile;
		$rate->message=$request->ratemessage;
		$rate->rate=$request->rateValue;
		$rate->user_id=Auth::user()->id;
		$rate->is_approve="disactive";
		$rate->create_at=Carbon::now();
		$rate->save();
             flash()->success('Thank you for your feedback, we will confirm your feedback soon');
             return redirect()->back();
// 		return back();
	
	}

	public static function increaseViewCount($umarhId){
		$update=DB::update('UPDATE umrahs SET umrahs.view_count=umrahs.view_count+1 
								 WHERE umrahs.id=?',[$umarhId]);
	}


}
