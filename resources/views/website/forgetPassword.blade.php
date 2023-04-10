@extends('website.layouts.app')
@section('content')
<section>

		
	 <section>
        <div class="tr-register">
            <div class="tr-regi-form">
                <h4>Forget Password</h4>
                <p>It's free and always will be.</p>
                <form class="col s12" method="POST" action="/forgetPassword">
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
                            <input type="submit" value="submit" class="waves-effect waves-light btn-large full-btn" > </div>
                </form>
              
             
            </div>
        </div>
    </section>
		
		
		
		
	</div>
</section>


@endsection