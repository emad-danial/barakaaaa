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
    
      .center {

  margin: auto;

  width: 60%;

  border: 5px solid #FF130d;

  padding: 10px;

}

</style>
<div class="step2form">


                        


                        


                            <div class="step3form">
                                <div class="row">
                                    <div class="center">
                                        <h3 class="text-center alert alert-success">Thank you for booking your package with Baraka Travel, Please wait our call within 24 hours to confirm your package.</h3>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h4>Pay e-Visa Fees</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table class="table invoice-items" cellpadding="0" cellspacing="0">
                                                                            <tbody>


                                                                                </tbody><thead>
                                                                                    <tr class="tp-total-tr">
                                                                                        <th class="first-col-th" width="55%">Your e-Visa charges</th>
                                                                                        <th class="second-col-th text-center"></th>
                                                                                        <th class="third-col-th text-center"></th>
                                                                                        <th class="last-col-th alignright">Total</th>
                                                                                    </tr>
                                                                                </thead>





                                                                           
                                                                                    <tbody><tr>
                                                                                        <td>
                                                                                            @if($type == "USACanadian")
                                                                                            <img src="/uploads/include/usa.jpg" width="30px">
                                                                                            <img src="/uploads/include/canada.jpg" width="30px">
                                                                                             USA / Canadian <b>$200 </b>
                                                                                            @elseif($type == "IndianPakistani")
                                                                                            	<img src="{{Request::root()}}/uploads/include/EGYPT.png" width="30px">
											                                                   	<img src='{{Request::root()}}/uploads/include/MOROCCAN.jpg' width="30px">
                                                                                            EGYPT / MOROCCAN <b>$400 </b>
                                                                                            @else
                                                                                               <!--<img src="/uploads/include/greenred.png" width="30px">-->
                                                                                               USA / CANDIAN/ UZBAKSTAIN/ PAKISTAN /INDIAN  
                                                                                                 <b>$400 </b>
                                                                                            @endif
                                                                                             
                                                                                        </td>
                                                                                        <td style="padding: 8px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #ddd;">X</td>
                                                                                        <td style="padding: 8px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #ddd;">
                                                                                            1</td>
                                                                                        <td class="alignright">
                                                                                           ${{$total}}</td>
                                                                                    </tr>
                                                                                <tr>
                                                                                    <td>Total (without service fees)</td>
                                                                                    <td class="text-center"></td>
                                                                                    <td class="text-center"></td>
                                                                                    <td class="alignright">
                                                                                        ${{$total}}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Merchant service fees 3 %</td>
                                                                                    <td class="text-center"></td>
                                                                                    <td class="text-center"></td>
                                                                                    <td class="alignright">
                                                                                        ${{$fees}}</td>
                                                                                </tr>
                                                                                <tr class="total">
                                                                                    <td class=""></td>
                                                                                    <td class="text-center"></td>
                                                                                    <td class="text-center">Total Amount Due</td>
                                                                                    <td class="alignright">
                                                                                       ${{$totalAmount}}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <div class="invoice-bottom-div">
                                            <div class="inv-p-block-btm">
                                                <div class="inv-p-block-btm-text">
                                                    <p>Please we in Baraka Travel need clear picture of front side and send it at <span style="color:blue;">booking@barakatravel.net</span> or via whatsapp  (310) 310-4146   If I am paying with credit card , I understand that I must also pay a service fees 3% to Merchant service Fees .</p>
              <!--                                      <p>-->
              <!--                                          <img src="/uploads/include/quickpay-icon.png">-->
              <!--                                      </p>-->
              <!--                                      <p>OR</p>-->
              <!--                                      <p>-->
              <!--                                          <img src="/uploads/include/zelle-icon.png"><br>-->
              <!--                                          Sent Payment to <a href="mailto:zamir@chicagohajj.com">booking@barakatravel.net </a>-->
              <!--                                      </p>-->
              <!--                                      <p>OR</p>-->
              <!--                                      <p>-->
              <!--                                          Issue a check in favor of Baraka Travel then take a clear picture of front side and send it at -->
              <!--                                          <br>-->
              <!--                                          <a target="_blank" href="mailto:info@chicagohajj.com">-->
              <!--                                              <img class="email-color-icon colorful-icon" src="/uploads/include/email-tp-icon.png">-->
              <!--                                              booking@barakatravel.net </a> or via-->
														<!--<a target="_blank" href="https://api.whatsapp.com/send?phone=17734658500&amp;text=%E2%80%9CI%20want%20to%20find%20about%20your%20Umrah%20E-visa%20only%20or%20Customized%20Umrah%20package%20or%20Hajj%20service%E2%80%9D%20Please%20select%20what%20service%20you%20want">-->
              <!--                                              <img class="whatsapp-color-icon colorful-icon" src="/uploads/include/wp-tp-icon.png">-->
              <!--                                              (310) 310-4146 -->
              <!--                                          </a>                                                        -->
              <!--                                      &nbsp;&nbsp;</p>-->
                                                </div>
                                            </div>

                                            <div class="inv-p-block-btm">

                                                <div class="inv-p-block-btm-text">
                                                    <p>If I am paying with credit card , I understand that I must also pay a service fees 3% to Merchant service Fess . </p>
                                                </div>
                                            </div>



                                            <div class="agree-textcheck">

                                                <p> <input id="ContentPlaceHolder1_CheckBox1" type="checkbox" name="ctl00$ContentPlaceHolder1$CheckBox1">
                                                   
													<span id="ContentPlaceHolder1_CustomValidator1" class="requird-text" style="visibility:hidden;">Please check this to proceed.</span>
                                                </p>


                                            </div>

                                        </div>

                                    </div>

                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="payment-img-div">-->
                                    <!--        <img src="/images/we-accept.png">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                </div>
                                <div class="row btn-div-evisa-2" style="text-align: center;">

                                   
    <a href="/evisa/step3/{{$evisa->id}}"class="stepper-from-btn-1">Next</a>

                                 
                                </div>
                            </div>





                        

                        
                    </div>


@endsection