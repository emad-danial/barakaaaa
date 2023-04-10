<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile'=>['required','string','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        
        
        
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        
         $GLOBALS['email']= $data['email'];
         Mail::send('admin.emails.user',['name'=>$data['first_name'] ,'email'=> $data['email'],'password'=> $data['password']], function ($message) {
    		          $message->from(emailSender(), 'Registration User Success');
    		          $message->subject('Registration Success');
    		          $message->to($GLOBALS['email']);
          });




         $link=request()->root()."/vergifed/".$data['email'];
          Mail::send('emails.vergifed',['link'=>$link], function ($message) {
                   $message->from(emailSender(), 'Verify User');
                   $message->subject('Verify');
                   $message->to($GLOBALS['email']);
           });
        
           
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
       
        ]);

    }


    public function register(Request $request)
    {
        
        // if ($request->has('g-recaptcha-response') && !empty($request->get('g-recaptcha-response')))
        // {
        //     $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.env('recaptchaBackEndKey').'&response='.$_POST['g-recaptcha-response']);
        //     $responseData = json_decode($verifyResponse);
           
        //    if($responseData->success == false){
        //          return back()->with(['notvertfied'=>"you Must verify Not Report"]);
        //    }
           
           
           
        // }else{
        //     return back()->with(['notvertfied'=>"you Must verify Not Report"]);
        // }

        
        
        
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return redirect('/login')->with(['status'=>"Please Check Your Email To get Your Email and Password"]);

    }
}
