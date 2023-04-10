@extends('website.layouts.app')
@section('content')
<style>
    .breadcrumbs-banner{
        margin-top: 90px;
    margin-bottom: 5px;

    }
    .inner_banner{

        padding: 180px 0px 40px 0px;
        position: relative;
        margin-top: -6%;

    }
    .inner-banner-default{
        background: url('{{Request::root()}}/uploads/include/cover.jpg') no-repeat center center ;
        background-size: cover;
    


    }
</style>
    
	<section class="breadcrumbs-banner slider-main">
    <div class="rows inner_banner inner-banner-default">
        <div class="container ">
            <h2><span>Umrah / Tourist E-Visa</span></h2>
        </div>
    </div>
</section>
<style>
    .con-page {
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .stepper-from {
        position: relative;
    }
    .tab-list {
        width: 100%;
        list-style: none;
        text-align: center;
        padding: 0 0;
        display: block;
        overflow: hidden;
    }
    ul.tab-list:after {
        position: absolute;
        content: "";
        height: 6px;
        width: 70%;
        left: 50%;
        transform: translateX(-50%);
        background: #dadada;
        z-index: -1;
        bottom: 18px;
    }
    .tab-list li {
        width: 33%;
        display: inline-block;
        transition: all 0.4s ease;
        padding: 0 13px;
        float: left;
    }
    .com-colo-abou p, li {
        color: #888;
    }
    a, p, li {
        font-size: 14.5px;
        line-height: 24px;
        font-family: 'open Sans', sans-serif;
        font-weight: 400;
    }
    .tab-list li.active .tab-list__link {
        background: #ff130d;
    }
    .tab-list__link {
        font-weight: 700;
        font-size: 15px;
        color: #fff;
        display: inline-block;
        -webkit-border-radius: 22.5px;
        -moz-border-radius: 22.5px;
        border-radius: 22.5px;
        background: #999;
        width: 90%;
        text-align: left;
    }


    .tab-list li.active .tab-list__link .step {
         background: rgb(171, 3, 3);;
    }
    .tab-list__link .step {
        display: inline-block;
        height: 45px;
        width: 45px;
        line-height: 45px;
        text-align: center;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        background: #666;
        font-size: 18px;
        margin-right: 10px;
    }
    .tab-list__link .desc {
        text-transform: capitalize;
        display: inline-block;
    }
    .step2form {
        background: white;
        border: 8px solid #efefef;
        border-radius: 4px;
        padding: 20px 30px;
    }
    label {
        font-size: 13px !important;
        color: #ff130d;
        font-weight: 600 !important;
    }
    input#ContentPlaceHolder1_txtHajjContactNumber_text {
        width: 100% !important;
    }
    .selectedite{
        position: relative;
        margin-top: -10%;
        width: 109%;
        margin-left: -4%;
    }
    .labeledite{
        margin-bottom: 12%;
    }
    .iedite{
        margin-left:-4%;
    }
    h5.upload-doc-text {
        font-size: 18px;
    }
    h5.upload-doc-text i {
        color: #ff130d;
    }
    span.imgmsg {
        font-size: 12px;
        color: #ff130d;
    }
    .applicant-main-div {
        border-radius: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .upload-box {
        width: 100%;
        border-right: 0;
        border-left: 0;
        padding: 0px 0px 0px;
        margin: 0px 0px;
    }
    a {
        color: #ff130d;
        text-decoration: none;
    }
    .stepper-from-btn-1 {
        min-width: 28%;
        -webkit-transition: all 0.5s ease;
        border-radius: 25px;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        background: #ff130d;
        font-size: 20px !important;
        margin-bottom: 10px;
    }
    .btn-div-evisa {
        margin: 10px 0px;
        margin-top: 35px !important;
        text-align: center;
    }

    .passport-custom-box-2.last-pass-box-2 {
        background: #ffffff;
        text-align: center;
    }
    .passport-custom-box-2 {
        border-radius: 15px;
        background: #fff;
        padding: 20px 20px 10px 15px;
        position: relative;
        overflow: hidden;
        border: 1px #777777;
        border-style: dashed;
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .passport-custom-box-2.last-pass-box-2 p {
        font-weight: 600;
        color: #17140b;
        /* text-shadow: 1px 1px 1px #000; */
        font-size: 24px;
    }
    img.colorful-icon {
        width: 22px;
    }
    /*////////////////////////*/
    td {
        font-size: 14.5px;
        line-height: 24px;
        font-family: 'open Sans', sans-serif;
        font-weight: 400;
    }
    .invoice .invoice-items {
        width: 100%;
    }

    .tp-total-tr {
        color: #fff;
        background: #ff130d;
    }
    .tp-total-tr th {
        border: 0 !important;
    }
    .first-col-th {
        border-radius: 8px 0px 0px 8px !important;
    }
     th {
        font-family: 'open Sans', sans-serif;
        font-weight: 600;
    }
    .tp-total-tr th {
        border: 0 !important;
    }
    .first-col-th {
        border-radius: 8px 0px 0px 8px !important;
    }
    .second-col-th {
        border-radius: 0px 0px 0px 0px !important;
    }
    .last-col-th {
        border-radius: 0px 8px 8px 0px !important;
    }
    .invoice .invoice-items td {
        border-left: none !important;
        border-right: none !important;
        border-top: #eee 1px solid;
        padding: 10px 10px;
    }
    .inv-p-block-btm {
        border-radius: 10px;
        background: #efefef;
        padding: 15px 15px;
        position: relative;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .inv-p-block-btm-text {
        position: relative;
        overflow: hidden;
    }
    .inv-p-block-btm p {
        display: block;
        float: left;
        width: 100%;
        text-align: center;
    }
    span {
        font-size: 14.5px;
        line-height: 24px;
        font-family: 'open Sans', sans-serif;
        font-weight: 400;
    }
    .inv-p-block-btm p {
        display: block;
        float: left;
        width: 100%;
        text-align: center;
    }
    .inv-p-block-btm {
        border-radius: 10px;
        background: #efefef;
        padding: 15px 15px;
        position: relative;
        overflow: hidden;
        margin-bottom: 10px;
    }
    .inv-p-block-btm-text {
        position: relative;
        overflow: hidden;
    }
    .agree-textcheck {
        margin: 10px 0px;
    }
    input#ContentPlaceHolder1_CheckBox1 {
        margin-left: 8px;
        transform: scale(2);
    }
    .package-form label, select, input {
        font-size: 13px !important;
    }
    .agree-text-span {
        margin-left: 8px;
    }
    .payment-img-div {
        text-align: center;
    }
    .payment-img-div img {
        margin-top: 30px;
    }
    .btn-div-evisa-2 {
        margin: 20px 0px 0px 0px;
    }
    .stepper-from-btn-1 {
        min-width: 28%;
        -webkit-transition: all 0.5s ease;
        border-radius: 25px;
        border: 0;
        padding: 10px 30px;
        color: #fff;
        background: #ff130d;
        font-size: 20px !important;
        margin-bottom: 10px;
    }
    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }
    .invoice .invoice-items td {
        border-left: none !important;
        border-right: none !important;
        border-top: #eee 1px solid;
        padding: 10px 10px;
    }
</style>
<section>
        <div class="rows con-page">
            <div class="container">
                <div class="pg-contact">

                    






<div>
<div id="ContentPlaceHolder1_ucNotify_valSummary" class="msg_warning" style="display:none;">

</div>
</div>


<div class="stepper-from">
    <ul class="tab-list">

        <li id="ContentPlaceHolder1_stp2" class="active">
            <span class="tab-list__link">
                <span class="step"><i class="fa fa-user" aria-hidden="true"></i></span>
                <span class="desc">Step 1</span>
            </span>
        </li>
        <li id="ContentPlaceHolder1_stp3">
            <span class="tab-list__link">
                <span class="step"><i class="fa fa-calculator" aria-hidden="true"></i></span>
                <span class="desc">Step 2</span>
            </span>
        </li>
        <li id="ContentPlaceHolder1_stp4">
            <span class="tab-list__link">
                <span class="step"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                <span class="desc">Step 3</span>
            </span>
        </li>
    </ul>
</div>




<div class="step2form">
    <div class="step2formuser">
        <div class="row">
           @if (\Session::has('message'))
               <div class="alert alert-success">
                   <ul>
                       <li>{!! \Session::get('message') !!}</li>
                   </ul>
               </div>
           @endif
    <form method="POST" action="/evisa/setp1"  enctype="multipart/form-data"> 
              @csrf
            <div class="col-md-3">
                <div class="form-group  form-group-icon-left">
                    <i class="fa fa-user input-icon"></i>
                    <label>
                        First Name*
                    </label>
                    <input required name="firstName" type="text" maxlength="20" value="{{$firstName}}"
                     id="firstName"  class="form-control">

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group  form-group-icon-left">
                    <i class="fa fa-user input-icon"></i>
                    <label>
                        Last Name*
                    </label>
                    <input  name="lastName" value="{{$lastName}}" type="text" maxlength="20" id="lastName" class="form-control" required>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group  form-group-icon-left">
                    
                    <label >
                       <i class="fa fa-phone input-icon" style="color:black;"></i> Contact Number*

                    <span id="ContentPlaceHolder1_txtHajjContactNumber_wrapper" class="RadInput RadInput_Default" style="white-space:normal;">
                        <input required type="text" size="20" value="@if($contact == '') +1 @else {{$contact}} @endif"   name="contactNumber" id="contactNumber" class="riTextBox riEnabled form-control custom-input-css-form" selectionlength="0" placeholder="(xxx) xxx xxxx" style="width:125px;">
                    </span>

                    
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group  form-group-icon-left">
                    <i class="fa fa-envelope input-icon"></i>
                    <label>
                        E-mail Address*
                    </label>
                    <input required name="email" value="{{$email}}" type="email" id="email" maxlength="100" id="ContentPlaceHolder1_txtHajjEmail" class="form-control" placeholder="example@yahoo.com">
                </div>
            </div>
        </div>
        <div class="row">
          
                <div id="ContentPlaceHolder1_UpdatePanel3">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12 abc">
                                <div class="form-group form-group-icon-left">
                                    <i class="fa fa-credit-card input-icon iedite"></i>
                                    <label class="labeledite">
                                            @if($countryName == "Bangladeshi") Bangladeshi Passport*
                                            @elseif($countryName == "USACanadian") USA /Canadian Passport*
                                            @elseif($countryName == "IndianPakistani") Indian Pakistani Passport*
                                            @endif

                                    </label>
                                    <select id="bangladeshi" class="form-control selectedite" required>
                                    	<option selected="selected" value="0">How many Passport?</option>
                                    	<option  value="1">1</option>
                                    	<option value="2">2</option>
                                    	<option value="3">3</option>
                                    	<option value="4">4</option>
                                    	<option value="5">5</option>
                                    	<option value="6">6</option>
                                    	<option value="7">7</option>
                                    	<option value="8">8</option>
                                    	<option value="9">9</option>
                                    	<option value="10">10</option>
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5 class="upload-doc-text"><i class="fa fa-upload" aria-hidden="true"></i> Upload Documents</h5>
                                         <span class="imgmsg">Max image size 5 MB ( Format: jpg, png )</span>
                                    </div>
                                </div>
                            </div>


                    </div>
                </div>
         

        </div>

        <div class="row">
            <div class="row" id="bangladeshiForm">
                <input type="hidden" name="passportCount" id="count" value="{{$count}}">
                <input type="hidden" name="countryType" id="countryName" value="{{$countryName}}">
              @for($i=0 ;$i<$count ; $i++)
               <div class="col-md-4">
                   <div class="applicant-main-div">
                       <h4> {{$i+1}}st Applicant</h4>
                       <div class="upload-box">
                           <label>Passport front page</label>
                           <input type="file" name="passport_{{$i}}" class="form-control" >
                       </div>
                       <div class="upload-box">
                           <label>Photo</label>
                           <input type="file" name="photo_{{$i}}"  >
                       </div>
                    </div>
                </div>
               @endfor   
            </div>
        </div>



        <div class="row">
            <div class="col-md-12 btn-div-evisa">
                <div class="form-group">
                    <p>
                        By clicking the submit button, I agree to <a href="/policyTerms">Terms &amp; Conditons*.</a>
                    </p><p>
                    



                           <input type="submit"  value="Submit"   class="stepper-from-btn-1">

        </form>
                </p></div>
            </div> </div> </label></div></div>
            </div>
        </div>

      
    </div>
</div>

         </div>
        </div>
    </div>
</section>







@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function(){
       
    

        $('#bangladeshi').on('change',function(){
            var countryName=$('#countryName').val();
            var count=$('#bangladeshi').val();
            var firstName=$('#firstName').val();
            var lastName=$('#lastName').val();
            var contactNumber=$('#contactNumber').val();
            var email=$('#email').val();
            let link='';
        
        
               link="/eVisa/eViseDetail/"+countryName+"/"+count;
                // link="/eVisa/eViseDetail/"+countryName+"/"+count+"/"+firstName+"/"+lastName+"/"+contactNumber+"/"+email;
            
        
             
            location.href = link;
        });
     


    });
</script>

@endsection

