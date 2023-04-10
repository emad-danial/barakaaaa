<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\AppSetting;
use DB;
use App\models\Umrah;
class aboutUsController extends Controller
{
	public function index(){
		$umrahCount=Umrah::all()->where('is_active','=','active')->where('package_type','=','umar')->count();
		$hajjCount=Umrah::all()->where('is_active','=','active')->where('package_type','=','hajj')->count();
		$hotels=DB::select('SELECT count(*) as count from hotels');
		$flight=DB::select('SELECT count(*) as count from flights');
		$appSetting=AppSetting::find(1)->first();
		return view('website.about_us',
			['appSetting'=>$appSetting,
			 'umrahCount'=>$umrahCount,
			 'hajjCount'=>$hajjCount,
			 'hotelsCount'=>$hotels[0]->count,
			 'flight'=>$flight[0]->count
		]);
	}
	
	
	public function faq(){
	    return view('website.faq');
	}
	
	public function policyTerms(){
	    return view('website.policyTerms');
	}
	
}
