<?php

namespace App\Http\Controllers\Admin;



use App\models\Flight;
use App\models\FlightsOrders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\BrokerCommission;
use App\models\BrokerBonuses;
use DB;
use Mail;
use App\Http\Controllers\website\flightsController;
use Illuminate\Routing\Redirector;

class FlightsOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
  public function index()
    {
        $totalSales='';
        $status='pending';
        $records=DB::table('user_flight')
            ->join('users','users.id','user_flight.user_id')
             ->join('flights','flights.id','user_flight.flight_id')
            ->where('user_flight.status','=','pending')
            ->select('users.*','user_flight.*','flights.price','flights.price_ch','flights.flight_name')->orderBy('user_flight.id', 'DESC')
            ->paginate(20);
            // dd($records);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.f_orders.index', compact('records','status','totalSales'));

    }
    public function spicificOrder($status='pending')
    {
         $totalSales='';
if($status == 'complete'){
    $totalflightssprice = DB::select("SELECT sum(user_flight.num_of_adults*flights.price)+SUM(user_flight.num_of_child*flights.price_ch) as totoal from user_flight INNER JOIN flights on flights.id=user_flight.flight_id WHERE user_flight.status='complete'");
    if ($totalflightssprice[0]->totoal == null) {
        $totalSales = 0;
    } else {
        $totalSales = $totalflightssprice[0]->totoal;
    }
}
        $records=DB::table('user_flight')
            ->join('users','users.id','user_flight.user_id')
             ->join('flights','flights.id','user_flight.flight_id')
            ->where('user_flight.status','=',$status)
            ->select('users.*','user_flight.*','flights.price','flights.price_ch','flights.flight_name')->orderBy('user_flight.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.f_orders.index', compact('records','status','totalSales'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'is_approve' => 'required',
//        ]);
//
//        $record = FlightsOrders::create($request->all());
//        $record->save();
//
//        flash()->success('Create Success');
//        return redirect(route('rates.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $model=DB::table('user_flight')
            ->join('users','users.id','user_flight.user_id')
             ->join('flights','flights.id','user_flight.flight_id')
             ->where('user_flight.id','=',$id)
            ->select('users.*','user_flight.*','flights.flight_name','flights.price','flights.price_ch')
           ->first();
           
            if($model !=null){
                
              $adultsprice= ($model->num_of_adults*$model->price);
              $chprice= ($model->num_of_child*$model->price_ch);
              $model->child_price=$chprice;
              $model->adults_price=$adultsprice;
              $model->total_price=($adultsprice+$chprice);
            }
            
        // dd($model);

        return view('admin.f_orders.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = FlightsOrders::findOrFail($id);
        return view('admin.f_orders.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse|Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {




  $records = FlightsOrders::findOrFail($id);
  




        $this->validate($request, [
            'status' => 'required',
        ]);

        $records->update([
            'status' => $request->status,
        ]);
        
     
      $GLOBALS['email']=$records->User->email;

if($request->status == 'complete'){
   
   
    if($records->User->type=='broker'){
            $type='flight';
              $commission = BrokerCommission::where('user_id', $records->User->id)->first();
              
              $totalflightssprice = DB::select("SELECT sum(user_flight.num_of_adults*flights.price)+SUM(user_flight.num_of_child*flights.price_ch) as totoal from user_flight INNER JOIN flights on flights.id=user_flight.flight_id WHERE user_flight.status='complete' AND user_flight.id= $records->id");

              
             if($totalflightssprice[0]->totoal != null ){
                  
                  $finelcommission=(($commission->commission/100)*$totalflightssprice[0]->totoal);
             }
             
              
              BrokerBonuses::create([
                'user_id' => $records->user_id,
                'order_id' => $records->id,
                'order_type' => $type,
                'commission' => $finelcommission,

            ]);
        }
  
   
    flightsController::sendEmail($records->id,$records->User->email,'Thanks For Flight Payment Success',$records->User->email);
 
}else{
    if($records->User->type=='broker'){
        $pouns=BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','flight')->first();
       
        if($pouns !=null){
            BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','flight')->delete();
        }
    }
}
        
        
//        dd($records);
        flash()->success('Edit Success');
        // return redirect(route('f_orders.index'));
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        FlightsOrders::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
