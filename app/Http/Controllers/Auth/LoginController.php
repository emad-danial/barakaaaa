<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/admin";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        
    }
    
    
    protected function authenticated(Request $request, $user){
        if($user->is_vertfied == 0) { 
            auth()->logout();
            return redirect('/login')->with(['completeverfied'=>"you Must Verify your email First"]);
        }
        
        // if ($request->has('g-recaptcha-response') && !empty($request->get('g-recaptcha-response')))
        // {
        //     $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.env('recaptchaBackEndKey').'&response='.$_POST['g-recaptcha-response']);
        //     $responseData = json_decode($verifyResponse);

        //    if($responseData->success == false){
        //         auth()->logout();
        //          return redirect('/login')->with(['notvertfied'=>"you Must Verify That Not Repot"]);
        // }


        // }else{
        //      auth()->logout();
        //     return redirect('/login')->with(['status'=>"go to your email"]);
        // }
        
        
    }


}
