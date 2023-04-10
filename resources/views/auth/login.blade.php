@extends('website.layouts.app')

@section('content')

    <!--DASHBOARD-->
    <section>
        <div class="tr-register">
            <div class="tr-regi-form">
                <h4>Sign In</h4>
                <p>It's free and always will be.</p>
                
              			    @if(session()->has('status'))
							<div class="alert alert-success contact__msg"  role="alert">
							        Please Check Your Email To get Your Email and Password
							</div>
							@endif

					    @if(session()->has('notvertfied') )

                            <p class="alert alert-danger"> You must verify you are not a robot </p>
                        @endif
        
                        @if(session()->has('completeverfied') )

                            <p class="alert alert-success"> Please activate your account from your email </p>
                        @endif

                
                <form class="col s12" method="POST" action="{{ route('login') }}">
                   @csrf
                        <div class="input-field col s12">
                            <input type="email" name="email" class="validate" required>
                            <label>email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-field col s12">
                            <input type="password" class="validate" name="password" required>
                            <label>Password</label>
                               @error('password')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror 
                        </div>
                        <div class="input-field col s12">
                            <div class="g-recaptcha" data-sitekey="{{env('recaptchSiteKey')}}"></div>

                        </div>

                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn" > </div>
                </form>
                <p> <a href="/forgetPassword">Forgot Password ?</a>  |  Are you a new user ? <a href="/register">Register</a>
                </p>
              <!--   <div class="soc-login">
                    <h4>Sign in using</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook fb1"></i> Facebook</a> </li>
                        <li><a href="#"><i class="fa fa-twitter tw1"></i> Twitter</a> </li>
                        <li><a href="#"><i class="fa fa-google-plus gp1"></i> Google</a> </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </section>
    <!--END DASHBOARD-->



@endsection
