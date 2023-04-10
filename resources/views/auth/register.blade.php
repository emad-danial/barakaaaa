@extends('website.layouts.app')

@section('content')


<!--DASHBOARD-->
<section>
    <div class="tr-register">
        <div class="tr-regi-form">
            <h4>Create an Account</h4>
            <p>It's free and always will be.</p>
            
    	    @if(session()->has('notvertfied') )
                    <p class="alert alert-danger"> You must verify you are not a robot </p>
            @endif
            
            <form class="col s12" method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="input-field col m6 s12">
                        <input type="text" class="validate" name="first_name" required>
                        <label>First Name*</label>
                         @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>
                    <div class="input-field col m6 s12">
                        <input type="text" class="validate" name="last_name" required>
                        <label>Last Name*</label>
                              @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="input-field col s12">
                        <input type="text" class="validate" name="mobile" required value="+1"> 
                        <label>Mobile*</label>
                              @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>
                    <div class="input-field col s12">
                        <input type="email" class="validate" name="email" required>
                        <label>Email*</label>
                             @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                       
                    </div>

                    <div class="input-field col s12">
                        <input type="password" class="validate" name="password" required>
                        <label>Password*</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      
                    </div>

                    <div class="input-field col s12">
                        <input type="password" class="validate" name="password_confirmation" required>
                        <label>Confirm Password*</label>
                     
                    </div>
                
                
                    <div class="input-field col s12">
                       <div class="g-recaptcha" data-sitekey="{{env('recaptchSiteKey')}}"></div>
                    </div>

                    <div class="input-field col s12">
                        <input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn"> 
                    </div>
            </form>
            <p>Are you a already member ? <a href="/login">Click to Login</a>
            </p>
        </div>
    </div>
</section>
<!--END DASHBOARD-->
 <!--====== FOOTER ==========-->



@endsection
