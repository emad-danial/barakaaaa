<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\models\ContactUs;
use Auth;
use Carbon\Carbon;
class contactUsController extends Controller
{
	public function index(){
		return view('website.contactUs');
	}
	public function contactUs(Request $request){
	
	
	      if ($request->has('g-recaptcha-response') && !empty($request->get('g-recaptcha-response')))
        {
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.env('recaptchaBackEndKey').'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
           
           if($responseData->success == false){
                 return back()->with(['notvertfied'=>"Your message is not sent, You must verify you are not a robot"]);
           }
           
           
           
        }else{
            return back()->with(['notvertfied'=>"Your message is not sent, You must verify you are not a robot"]);
        }

	
	
	
	
		$validate=Validator::make($request->all(),[
			'name'=>'required|min:3',
			'mobile'=>'required|numeric',
			'email'=>'required|email',
			'message'=>'required|min:3',
			
		]);
		if($validate->fails())	return redirect('/contact_us')->withErrors($validate);

		$contact=new ContactUs();
		$contact->name=$request->name;
		$contact->phone=$request->mobile;
		$contact->email=$request->email;
		$contact->message=$request->message;
	if (Auth::check())	
		$contact->user_id=Auth::user()->id;
		$contact->created_at=Carbon::now();
		$contact->updated_at=Carbon::now();
		$contact->save();


		return redirect()->back()->with('success', 'Your message has been sent successfully!');



	}
}
