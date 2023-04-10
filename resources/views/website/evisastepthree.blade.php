@extends('website.layouts.app')
@section('content')
   <section>
   			@if($status == "success")
   			    <div class="alert alert-success">Thank's for complete your Payment Now waiting For message From the Mangement</div>
   			@endif    

   			@if($status == "fail")
   			    <div class="alert alert-danger">Payment Fail</div>
   			@endif    
   </section>
@endsection