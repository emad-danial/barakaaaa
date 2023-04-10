@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="text-align: center">
                        <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works"
                           onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img
                                src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0"
                                alt="PayPal Logo"></a>
                    </div>

                    <div class="card-body">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        @endif
                        <form method="POST" action="{{route('payment.paypal')}}">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12" >
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autofocus
                                           placeholder="Enter Your Name" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="price" type="text"
                                           class="form-control @error('price') is-invalid @enderror"
                                           name="price" value="{{ old('price') }}" autofocus placeholder="Enter Price"
                                           required>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="desc" type="text"
                                           class="form-control @error('desc') is-invalid @enderror"
                                           name="desc" value="{{ old('desc') }}" autofocus placeholder="Enter Description"
                                           required>

                                    @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <select name="currency"
                                            class="form-control form-control @error('currency') is-invalid @enderror"
                                            required>
                                        <option disabled selected>Currency</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>

                                    @error('currency')
                                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection







