<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use App\models\evisa;
use App\models\PackagesOrders;
use App\models\hotelOrder;
class paymentController extends Controller
{
    private $client_id;
    private $client_secret;
    private $appContext;

    public function __construct()
    {
        $mode = config('paypal.mode');
        $credentials = config("paypal.$mode");
        $this->client_id = $credentials['client_id'];
        $this->client_secret = $credentials['client_secret'];

        $this->appContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->client_secret));
        $this->appContext->setConfig(config('paypal.settings'));
    }

    public  function payment($price=0,$name="",$orderId=0,$type="evisa"){
        $price = $price;
        $name = $name;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($type)
            ->setCurrency("USD")
            ->setQuantity(1)
            ->setSku($orderId)
            ->setPrice($price);


        $itemList = new ItemList();
        $itemList->setItems([$item]);

        $amount = new Amount();
        $amount
            ->setCurrency("USD")
            ->setTotal($price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment Paypal")
            ->setInvoiceNumber(uniqid("", TRUE));

        $redirectUrl = new RedirectUrls();
        $redirectUrl
            ->setReturnUrl(route('paypal.success'))
            ->setCancelUrl(route('paypal.fail'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrl)
            ->setTransactions([$transaction]);

        try {
            $payment->create($this->appContext);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        $payment_link = $payment->getApprovalLink();

        return $payment_link;
    }

    public function success()
    {
        if (!request('PayerID') || !request('paymentId') || !request('token')) {
            return redirect('/paypal/fail');
        }
        $payment = Payment::get(request('paymentId'), $this->appContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));
        
        try {
            $result = $payment->execute($execution, $this->appContext);
        } catch (PayPalConnectionException  $e) {
            dump($e->getData(), ($e->getCode()));
            dd('gg');
        }


       
        if ($result->getState() != 'approved') 
                return redirect("/paypal/fail");    
        
        $orderId=$result->transactions[0]->item_list->items[0]->sku;
        $type=$result->transactions[0]->item_list->items[0]->name;
       
        if($type == "evisa")
            $order=evisa::find($orderId);
        elseif($type == "umarh" || $type="hajj" )
            $order=PackagesOrders::find($orderId);
        elseif($type == "hotel")
            $order=hotelOrder::find($orderId);



            $order->paymentId=request('paymentId');
            $order->token=request('token');
            $order->PayerID=request('PayerID');
            $order->status="paymentComplete";
            $order->save();
        

            


            // return view('website.evisastepthree',['status'=>"success"]);

        $user=Auth::user();
		return view('website.confirmation',['user'=>$user]);


    }

    public function fail(){
        return view('website.evisastepthree',['status'=>"fail"]);
    }
    
}
