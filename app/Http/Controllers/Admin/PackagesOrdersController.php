<?php

namespace App\Http\Controllers\Admin;


use App\models\BrokerPaidUser;
use App\models\Flight;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\models\Umrah;
use App\Http\Controllers\Controller;
use App\models\BrokerCommission;
use App\models\BrokerBonuses;
use DB;
use Mail;
use App\models\AppSetting;
use App\Http\Controllers\website\email;


use Illuminate\Routing\Redirector;

class PackagesOrdersController extends Controller
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
        $pagename="Pending Umrah Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.status','=','pending')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.index', compact('records','pagename','totalSales'));
    }
    
    
   
    
 public function pendingOrderUmrah()
    {
        $totalSales='';
        $pagename="Pending Umrah Orders";

        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.status','=','pending')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.index', compact('records','pagename','totalSales'));
    }
    public function pendingOrderHajj()
    {
        $totalSales='';
         $pagename="Pending Hajj Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','hajj')->where('orders_package.status','=','pending')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.hajj_orders.index', compact('records','pagename','totalSales'));
    }
    public function inProcessOrderUmrah()
    {
        $totalSales='';
         $pagename="In Process Umrah Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.status','=','in_process')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.index', compact('records','pagename','totalSales'));
    }
    public function inProcessOrderHajj()
    {
        $totalSales='';
          $pagename="In Process Hajj Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','hajj')->where('orders_package.status','=','in_process')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.hajj_orders.index', compact('records','pagename','totalSales'));
    }

public function completeOrderUmrah()
    {
        $totalSales='';
          $totalumrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN users user on(user.id=po.user_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE   (po.status='complete' OR po.status='paymentComplete' )  AND u.package_type ='umar'  AND user.type ='user'");

        if ($totalumrahprice[0]->totoal == null) {
            $totalSales = 0;
        } else {
            $totalSales = $totalumrahprice[0]->totoal;
        }
        $pagename="Complete Umrah Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.status','!=','pending')->where('orders_package.status','!=','in_process')->where('orders_package.status','!=','in_process')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.index', compact('records','pagename','totalSales'));
    }
    public function completeOrderHajj()
    {
        $totalSales='';
         $totalhajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN users user on(user.id=po.user_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE (po.status='complete' OR po.status='paymentComplete' ) AND u.package_type ='hajj'  AND user.type ='user'");

        if ($totalhajjprice[0]->totoal == null) {
            $totalSales = 0;
        } else {
            $totalSales = $totalhajjprice[0]->totoal;
        }
        $pagename="Complete Hajj Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','hajj')->where('orders_package.status','!=','pending')->where('orders_package.status','!=','in_process')->where('orders_package.status','!=','in_process')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.hajj_orders.index', compact('records','pagename','totalSales'));
    }
public function cancelOrderUmrah()
    {
        $totalSales='';
        
         $pagename="Cancel Umrah Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.status','=','cancel')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.index', compact('records','pagename','totalSales'));
    }
    public function cancelOrderHajj()
    {
        $totalSales='';
        $pagename="Cancel Hajj Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','hajj')->where('orders_package.status','=','cancel')->where('users.type','=','user')
            ->select('users.*','orders_persons.first_name','orders_persons.last_name','orders_package.*','umrahs.package_type','umarh_pricing.price')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.hajj_orders.index', compact('records','pagename','totalSales'));
    }




    public function brokersOrdersrUmrah()
    {
        $totalSales='';
        $pagename="Partner Umrah Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('users.type','=','broker')
            ->select('users.*','orders_persons.first_name as person_first_name','orders_persons.last_name as person_last_name','orders_package.*','umrahs.package_type','umrahs.name as package_name','umarh_pricing.price','umarh_pricing.name as room_name')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
            
            //  dd($records);
            
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.packages_orders.brokersorders', compact('records','pagename','totalSales'));
    }


    public function brokersOrdersrHajj()
    {
        $totalSales='';
        $pagename="Partner Hajj Orders";
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','hajj')->where('users.type','=','broker')
            ->select('users.*','orders_persons.first_name as person_first_name','orders_persons.last_name as person_last_name','orders_package.*','umrahs.package_type','umrahs.name as package_name','umarh_pricing.price','umarh_pricing.name as room_name')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
            
            // dd($records);
            
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('admin.hajj_orders.brokersorders', compact('records','pagename','totalSales'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        return view('admin.rates.create');
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
//        $record = PackagesOrders::create($request->all());
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
        $model = PackagesOrders::findOrFail($id);
        $price = UmrahPricing::findOrFail($model->package_pricing_id);
        $persons = PackagesOrdersPersons::where('order_package_id',$id)->paginate(1000);
        $package = Umrah::findOrFail($price->umarh_id);
       
       $companyName='';
      
       if($model->User->type == 'broker'){
           
           $commission = BrokerCommission::where('user_id', $model->User->id)->first();
            
           if($commission->company_name !=null){
               $companyName=$commission->company_name;
           }
       }
       
       
       $Financialoperations=BrokerPaidUser::where('broker_id',$model->user_id)->where('order_id',$model->id)->orderBy('id', 'desc')->paginate(20000000000);
       
       
        return view('admin.packages_orders.show', compact('model','price','persons','package','companyName','Financialoperations'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = PackagesOrders::findOrFail($id);
        return view('admin.packages_orders.edit', compact('model'));
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
        $records = PackagesOrders::findOrFail($id);
        

       
        $this->validate($request, [
            'status' => 'required',
        ]);

        $records->update([
            'status' => $request->status,
        ]);


 $GLOBALS['email']=$records->User->email;

if($request->status == 'complete'){
    
          if($records->User->type=='broker'){
            $type='';
              $commission = BrokerCommission::where('user_id', $records->User->id)->first();
              $umrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE po.status='complete' AND u.package_type ='umar' AND po.id =$records->id");
              $hajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE po.status='complete' AND u.package_type ='hajj' AND po.id =$records->id");
             
             if($umrahprice[0]->totoal != null ){
                  $type='umar';
                  $finelcommission=(($commission->commission/100)*$umrahprice[0]->totoal);
             }elseif($hajjprice[0]->totoal != null){
                  $type='hajj';
                  $finelcommission=(($commission->commission/100)*$hajjprice[0]->totoal);
             }
             
              
              BrokerBonuses::create([
                'user_id' => $records->user_id,
                'order_id' => $records->id,
                'order_type' => $type,
                'commission' => $finelcommission,

            ]);
        }
        
        email::email($records->id,$records->User->email,$records->User,"Thanks For Package Payment Success");
        email::email($records->id,AppSetting::all()->first()->email,$records->User,"Thanks For Package Payment Success");
        
        
 
}else{
    if($records->User->type=='broker'){
       $pouns=BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','!=','hotel')->where('order_type','!=','flight')->first();
      
       if($pouns !=null){
           BrokerBonuses::where('user_id',$records->user_id)->where('order_id',$records->id)->where('order_type','!=','hotel')->where('order_type','!=','flight')->delete();
       }
    }
}



        flash()->success('Edit Success');
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
        
         if(PackagesOrders::find($id) != null){
              PackagesOrders::find($id)->delete();
        }
       
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
