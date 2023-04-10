<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\evisa_detail;
use Validator;
use DB;
use App\models\evisa;
use App\models\AppSetting;
use App\Http\Controllers\website\eVisaController;
use App\Http\Controllers\paymentController;
use Mail;
use Auth;
use Illuminate\Support\Str;
class eVisaController extends Controller
{
	public function index(){
		return view('website.eVisa');
	}

	public function evisaDetail($countryName,$count,$first="",$last="",$contact="",$email=""){

		return view('website.eVisaDetail',
			['countryName'=>$countryName,
			 'count'=>$count,
			 'firstName'=>$first,
			 'lastName'=>$last,
			 'contact'=>$contact,
			 'email'=>$email]);
	}

	public function step1(Request $request){	
	
		$validate=Validator::make($request->all(),[
			'firstName'=>'required|min:3',
			'lastName'=>'required|min:3',
			'contactNumber'=>'required|min:3',
			'email'=>'required|min:3|email',
			'countryType'=>'required',
			'passportCount'=>'required'
		]);
		if($validate->fails())	
			return back()->with('message','make sure that you enter all Required Field');

		if($request->passportCount == 0) 
			return back()->with('message','make sure that you enter all Required Field');


		for ($i=0;$i<$request->passportCount;$i++) { 
			if($request->file('passport_'.$i) == false || $request->file('photo_'.$i) == false )
				 return back()->with('message','make sure that you enter all Required Field');
		}

		$evisa=new evisa();
		$evisa->first_name=$request->firstName;
		$evisa->last_name=$request->lastName;
		$evisa->contact_number=$request->contactNumber;	
		$evisa->user_id=Auth::user()->id;
		$evisa->email=$request->email;
		$evisa->save();

		for ($i=0;$i<$request->passportCount;$i++) { 
			$evisaDetail=new evisa_detail();
			$evisaDetail->evisa_id=$evisa->id;
			$evisaDetail->passport_type=$request->countryType;
			$evisaDetail->passport_photo=eVisaController::uploadImage($request->file('passport_'.$i));
			$evisaDetail->photo=eVisaController::uploadImage($request->file('photo_'.$i));
			$evisaDetail->save();

		}
		



        	 return redirect('/evisa/step2/'.$evisa->id);
		


	}

	public  static function uploadImage($file){
	    $icon =$file;
        $icon_new_name =Str::random(30) . $icon->getClientOriginalName();
        $icon->move('uploads/evisa', $icon_new_name);
        return  'uploads/evisa/' . $icon_new_name;
	}
	
	
	public function step2($evisa){
	    $evisa=evisa::find($evisa);
	    $evisaDetail=evisa_detail::where('evisa_id','=',$evisa->id)->get();
        
        $total=0;
        $count=0;
        foreach($evisaDetail as $key){
            if($key->passport_type == "USACanadian")  {               $total=$total+200; $type="USACanadian"; }
            elseif($key->passport_type == "IndianPakistani"){         $total=$total+400; $type="IndianPakistani";}
            elseif($key->passport_type == "Bangladeshi")     {        $total=$total+400; $type="Bangladeshi"; }
            $count++;
        }
        
        
        $fees=$total*(3/100);
        $totalAmount=$fees+$total;
        $email=$evisa->email;
        $numberOfPersons=evisa_detail::where('evisa_id','=',$evisa->id)->count();
        
        // in that area we will send an email
        self::sendEmail($email,$evisa,$numberOfPersons,$total,$fees,$totalAmount);
        self::sendEmail(AppSetting::all()->first()->email,$evisa,$numberOfPersons,$total,$fees,$totalAmount);
    
      
	    return view('website.evisasteptwo',['evisa'=>$evisa,
	                                        'total'=>$total,
	                                        'totalAmount'=>$totalAmount,
	                                        'fees'=>$fees,
	                                        'type'=>$type,
	                                        'count'=>$count
	                                        ]);
	}
	
	
	public function step3($evisa){
		
	    $evisa=evisa::find($evisa);
	    $evisaDetail=evisa_detail::where('evisa_id','=',$evisa->id)->get();
        
        $total=0;
        foreach($evisaDetail as $key){
            if($key->passport_type == "USACanadian")  {               $total=$total+200; $type="USACanadian"; }
            elseif($key->passport_type == "IndianPakistani"){         $total=$total+400; $type="IndianPakistani";}
            elseif($key->passport_type == "Bangladeshi")     {        $total=$total+400; $type="Bangladeshi"; }
           
        }
        
        
        $fees=$total*(3/100);
        $totalAmount=$fees+$total;
 
      

        $price=$totalAmount;
        $name=$evisa->first_name;
        $orderId=$evisa->id;




	$payment=new paymentController();
	 return redirect($payment->payment($price,$name,$orderId));	
	    
	}
	
	
	
	
	
	
	
	
	
	
	public static function sendEmail($email,$evisa,$numberOfPersons,$total,$fees,$totlaPrice){
	    $GLOBALS['email']=$email;
	    $GLOBALS['subject']="Evisa Booking-Baraka Travel";
		    Mail::send('website.billEvisa',['evisa'=>$evisa,
		                                    'numberOfPersons'=>$numberOfPersons,
		                                    'total'=>$total,
		                                    'fees'=>$fees,
		                                    'totlaPrice'=>$totlaPrice], function ($message) {
		          $message->from(emailSender(),"Evisa Booking-Baraka Travel");
		          $message->subject($GLOBALS['subject']);
		          $message->to($GLOBALS['email']);
		    });
	}
	
	
	
	
	
	
	
	
	
	
	
	
}		