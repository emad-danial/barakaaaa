<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

use App\models\Hotel as Hotels;
use App\models\Flight as Flights;
use App\models\Umrah;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/getPaymentPackage/{orderId}/{type}/{webOrAPI}','website\paymentController@completePayment');
Route::get('paypal','PayPalController@index')->name('show.paypal');
Route::post('paymentPaypal', 'PayPalController@payment')->name('payment.paypal');
Route::get('payment/cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');


Route::get('/sitemap', function () {

    // SitemapGenerator::create('https://barakatravel.net/')->writeToFile('sitemap.xml');
    // SitemapGenerator::create('https://barakatravel.net/')->getSitemap()
    //     ->add(Url::create('/about-us')->setPriority(0.5))
    //     ->add(Url::create('/hotels')->setPriority(0.5))
    //     ->add(Url::create('/flights')->setPriority(0.5))
    //     ->writeToFile('sitemap.xml');
    // return 'sitemap xml generated';
    
       $getHotels=Hotels::all();
    $getFlights=Flights::all();
    $getUmrahs=Umrah::all();
    SitemapGenerator::create('https://barakatravel.net/')->writeToFile('sitemap.xml');
    $siteMapObject=SitemapGenerator::create('https://barakatravel.net/')->getSitemap()
        ->add(Url::create('/about-us')->setPriority(0.5))
        ->add(Url::create('/contact_us')->setPriority(0.8))
        ->add(Url::create('/eVisa')->setPriority(0.8))
        ->add(Url::create('/hotels')->setPriority(0.5))
        ->add(Url::create('/flights')->setPriority(0.5));

    foreach($getHotels as $key){
        $siteMapObject->add(Url::create('/hotels/'.$key->id.'/'.$key->name)->setPriority(0.8));
    }
    foreach($getFlights as $key){
        $siteMapObject->add(Url::create('/flights/'.$key->id.'/'.$key->flight_name)->setPriority(0.8));
    }
    foreach($getUmrahs as $key){
        $siteMapObject->add(Url::create('/umrah-package-details/'.$key->id.'/'.$key->name)->setPriority(0.8));
    }

    $siteMapObject->writeToFile('sitemap.xml');

    return 'sitemap xml generated';
    
});



Route::get('/updateapp', function()
{
    \Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from ItSolutionStuff.com',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('fadymounir96@gmail.com')->send(new \App\Mail\OrderShipped($details));

    dd("Email is Sent.");
});



// start website Routes
            Route::get('/forgetPassword','website\homeController@forgetPassword');
            Route::post('/forgetPassword','website\homeController@postForgetPassword');
            Route::get('/','website\homeController@index');
            Route::get('/confirmation','website\homeController@confirmation');
            Route::get('/umrah-package-details/{umarhId}/{packageName}','website\umrahPackageDetails@index');
            
            Route::get('/about-us','website\aboutUsController@index');
            Route::get('/package/{type}','website\umrahPackageDetails@getPackage');
            Route::get('/policyTerms','website\policyTermsController@index');
            Route::get('/faq','website\faqController@index');
            Route::get('/contact_us','website\contactUsController@index');
            Route::post('/contact_us/contact','website\contactUsController@contactUs');
            
            Route::get('/hotels','website\hotelsController@index');
            Route::get('/hotels/{id}/{name}','website\hotelsController@hoteldetail');
            Route::get('/flights','website\flightsController@index');
         Route::get('/event_gallery', 'website\EventGalleryController@index');
Route::get('/event_gallery/{id}/{title}', 'website\EventGalleryController@getEventDetails');

            
Route::get('/eVisa','website\eVisaController@index');            
Route::post('/bookHotel','website\hotelsController@bookHotel');            
  Route::get('/flights/{id}/{name}','website\flightsController@flightDetail');         
  Route::get('/evisa/step3/{evisa}','website\eVisaController@step3');
            
Route::group(['middleware' => ['auth']], function () {


Route::get('/eVisa/eViseDetail/{countryName}/{count}/{first}/{last}/{contact}/{email}','website\eVisaController@evisaDetail');
Route::get('/eVisa/eViseDetail/{countryName}/{count}','website\eVisaController@evisaDetail');
Route::post('/evisa/setp1','website\eVisaController@step1');    
Route::get('/evisa/step2/{evisa}','website\eVisaController@step2');




        Route::post('/submit/rate/package','website\umrahPackageDetails@submitRate');
        Route::post('/submit/rate/hotel','website\hotelsController@submitRate');
        Route::post('/flights/getOffer','website\flightsController@getOfferFlight');
        Route::post('/bookIng','website\bookingController@bookingPackage');
        Route::get('/bookHotel/{hotelPricingId}/{hotelId}','website\hotelsController@bookHotel');
                            
                            
        Route::get('/profile','website\profileController@index');
        Route::get('/editProfile','website\profileController@editProfile');
        Route::post('/updateProfile','website\profileController@updateProfile');
        Route::get('/flightBookIng','website\profileController@flightBookIng');
        Route::get('/flightBookIng/{userflightId}','website\profileController@flightBookIngProfile');
        Route::get('/hotelsBookIng','website\profileController@hotelsBookIng');
        Route::get('/hotelsBookIng/{orderHotelId}','website\profileController@hotelsBookIngProfile');
        
        Route::get('/hajjBooking','website\profileController@hajjBooking');
        Route::get('/hajjBooking/{orderPackageId}','website\profileController@hajjBookingDetail');
        
        
        Route::get('/umarahBooking','website\profileController@umarahBooking');
        Route::get('/umarahBooking/{orderPackageId}','website\profileController@umarahBookingDetail');
        Route::get('/getBill/{packageId}','website\email@index');
        Route::get('/sendEmail','website\email@email');
        Route::get('/Evisa','website\profileController@Evisa');
        Route::get('/Evisa/{evisaId}','website\profileController@EvisaDetail');
        
});
  
// end website Routes


Auth::routes();

/*start of admin roles */
Route::group(['prefix' => 'admin'], function () {
         Route::group(['middleware' => ['auth', 'adminRole']], function () {


            Route::group(['namespace' => 'Admin'], function () {

            Route::get('/', 'GeneralController@dashboard')->name('dashboard');

            Route::get('/settings', 'SettingController@index')->name('settings');
            Route::post('/settings/update', 'SettingController@update')->name('settings.update');
             Route::post('/event/addImage', 'EventGalleryController@addImage')->name('events.addImage');
            Route::post('/event/addVideo', 'EventGalleryController@addVideo')->name('events.addVideo');
          
            Route::get('/deleteImage/{id}/{type}', 'GeneralController@deleteImage')->name('deleteImage');
             Route::get('/deleteroom/{id}/{type}', 'GeneralController@deleteroom')->name('deleteroom');
            Route::resource('includes', 'IncludesController');
            Route::resource('umrahs', 'UmrahsController');
            Route::resource('hajjs', 'HajjsController');
            
          
        });
        Route::group(['namespace' => 'admin'], function () {

            Route::resource('amenities', 'AmenitiesController');
              Route::resource('rates', 'RatesController');
            Route::resource('faqs', 'FaqController');
             Route::get('brokers/{id}/add', 'BrokersController@add');
             Route::get('brokers/{id}/show', 'BrokersController@show');
              Route::resource('brokers', 'BrokersController');
                Route::resource('users', 'UsersController');
                Route::resource('admins', 'AdminsController');
                 Route::resource('flights', 'FlightsController');
                  Route::get('f_orders/{status}', 'FlightsOrdersController@spicificOrder');
                  Route::get('f_orders/{id}/show', 'FlightsOrdersController@show');
                 Route::resource('f_orders', 'FlightsOrdersController');
                  Route::resource('contact_us', 'ContactUsController');
                  Route::get('order_h/{status}', 'OrderHotelsController@spicificOrder');
                   Route::get('order_h/{id}/show', 'OrderHotelsController@show');
                 Route::resource('order_h', 'OrderHotelsController');
                  
                 Route::resource('hotels', 'HotelsController');
                 Route::resource('app_gallery', 'AppGalleryController');
                 Route::resource('events', 'EventGalleryController');
                  Route::get('packages_orders/pendingOrderUmrah', 'PackagesOrdersController@pendingOrderUmrah');
            Route::get('packages_orders/inProcessOrderUmrah', 'PackagesOrdersController@inProcessOrderUmrah');
            Route::get('packages_orders/completeOrderUmrah', 'PackagesOrdersController@completeOrderUmrah');
            Route::get('packages_orders/cancelOrderUmrah', 'PackagesOrdersController@cancelOrderUmrah');
             Route::get('packages_orders/brokersOrdersrUmrah', 'PackagesOrdersController@brokersOrdersrUmrah');
            Route::resource('packages_orders', 'PackagesOrdersController');
            Route::get('hajj_orders/pendingOrderHajj', 'PackagesOrdersController@pendingOrderHajj');
            Route::get('hajj_orders/inProcessOrderHajj', 'PackagesOrdersController@inProcessOrderHajj');
            Route::get('hajj_orders/completeOrderHajj', 'PackagesOrdersController@completeOrderHajj');
            Route::get('hajj_orders/cancelOrderHajj', 'PackagesOrdersController@cancelOrderHajj');
             Route::get('hajj_orders/brokersOrdersrHajj', 'PackagesOrdersController@brokersOrdersrHajj');
            Route::resource('hajj_orders', 'PackagesOrdersController');
            
            Route::get('evisa/pending', 'EvisaController@spicificPendingOrder');
            Route::get('evisa/delivered', 'EvisaController@spicificDeliveredOrder');
            Route::resource('evisa', 'EvisaController');

            Route::get('packages_views/{package}', 'PackageViewController@packageView');
            Route::resource('packages_views', 'PackageViewController');
            
            Route::resource('broker_withdrawal_requests', 'BrokersWithdrawRequestesController');

                  Route::get('/deleteFinancialoperationsadmin/{id}/{type}', 'GeneralController@deleteFinancialoperationsadmin')->name('deleteFinancialoperationsadmin');

        });
    });

});

/*end of admin roles*/


/*start of broker Role*/

Route::group(['prefix' => 'broker'], function () {
    Route::group(['middleware' => ['auth', 'brokerRoles']], function () {

            Route::group(['namespace' => 'broker'], function () {
            Route::get('/', 'BrokerGeneralController@dashboard')->name('dashboard');
            Route::resource('broker_umrahs', 'UmrahsBrokerController');
            Route::resource('broker_hajjs', 'HajjsBrokerController');
            Route::resource('broker_flights', 'FlightsBrokerController');
            Route::resource('broker_hotels', 'HotelsBrokerController');
            
            Route::resource('my_flight_orders', 'MyFlightsOrdersController');
            Route::resource('my_order_hotel', 'MyOrderHotelsController');
             Route::get('/my_hajj_orders/add/{id}', 'MyHajjOrdersController@add');
            Route::resource('my_hajj_orders', 'MyHajjOrdersController');
            Route::get('/my_package_orders/add/{id}', 'MyPackagesOrdersController@add');
            Route::resource('my_package_orders', 'MyPackagesOrdersController');
            Route::resource('broker_withdraw', 'BrokerWithdrawController');
            Route::resource('broker_balance', 'BrokerBalanceController');
            Route::get('/deleteFinancialoperations/{id}/{type}', 'BrokerGeneralController@deleteFinancialoperations')->name('deleteFinancialoperations');
            
            



        });
      
    });
});
/*end of broker Role*/





Route::get('paypal','paymentController@payment');
Route::get('paypal/success','paymentController@success')->name('paypal.success');
Route::get('paypal/fail','paymentController@fail')->name('paypal.fail');


Route::get('/vergifed/{email}','website\homeController@vergifed');



