<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\website\objects\umarh;
use App\Http\Controllers\website\umrahPackageDetails;
use App\models\Umrah;
use App\models\Event;
use App\models\EventGallery;
use Validator;
use App\models\Rate;
use Carbon\Carbon;
use Auth;

class EventGalleryController extends Controller
{

    public function index()
    {
        $events=Event::where('status','1')->with('gallery')->get();
		if(!empty($events)){
           return view('website.eventGallery', ['events' =>$events]);
		}
		return redirect('/');
       
    }

    /**
     * [getPackage description]
     * @param  [type] the type of packages   umarh or hajj
     * @return [type]       array of object of umarh
     */
    public function getEventDetails(Request $request,$id,$title)
    {
        $event=Event::where('id',$id)->where('status','1')->with('gallery')->first();
       if(!empty($event)){
           $meta_title=$event->title;
           $meta_description=$event->description;
           return view('website.eventGalleryDetails', ['event' => $event,'meta_title'=>$meta_title,'meta_description'=>$meta_description]);
       }
        return redirect('/');
    }


}
