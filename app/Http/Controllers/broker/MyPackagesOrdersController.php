<?php

namespace App\Http\Controllers\Broker;



use App\models\Flight;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\BrokerPaidUser;
use DB;

use App\models\Umrah;
use App\models\BrokerCommission;

use Illuminate\Routing\Redirector;

class MyPackagesOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
//        dd("dd");
        $pagename='Umrah Orders';
        $userID= auth()->user()->id ;
        $records=DB::table('orders_package')
            ->join('umarh_pricing','orders_package.package_pricing_id','umarh_pricing.id')
            ->join('umrahs','umrahs.id','umarh_pricing.umarh_id')
            ->join('users','users.id','orders_package.user_id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type','=','umar')->where('orders_package.user_id','=',$userID)
            ->select('users.*','orders_persons.first_name as person_first_name','orders_persons.last_name as person_last_name','orders_package.*','umrahs.package_type','umrahs.name as package_name','umarh_pricing.price','umarh_pricing.name as room_name')->orderBy('orders_package.id', 'DESC')
            ->paginate(20);
//        $records = PackagesOrders::orderBy('id', 'desc')->paginate(20);
        return view('broker.my_packages_orders.index', compact('records','pagename'));
    }
  
 
   
  

  
   
   
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        return view('broker.rates.create');
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
         $userID= auth()->user()->id ;
        $model = PackagesOrders::findOrFail($id);
        if($model->user_id == $userID ){
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
       
       
         $Financialoperations=BrokerPaidUser::where('broker_id',$userID)->where('order_id',$id)->orderBy('id', 'desc')->paginate(20000000000);
      
        return view('broker.my_packages_orders.show', compact('model','price','persons','package','companyName','Financialoperations','id'));  
        }else{
            return "You Can`t Show This Order You Not Owner";
        }
      
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $userID= auth()->user()->id ;
        $model = PackagesOrders::findOrFail($id);
        if($model->user_id == $userID ){
              return view('broker.my_packages_orders.edit', compact('model'));
        }else{
            return "You Can`t Edit This Order You Not Owner";
        }
    }
       public function add($id)
    {
        
        $userID= auth()->user()->id ;
        $model = PackagesOrders::findOrFail($id);
       
        if($model->user_id == $userID ){
              return view('broker.my_packages_orders.add', compact('model'));
        }else{
            return "You Can`t Add This Order You Not Owner";
        }
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
        
       
        if($request->typeupdate == 'financial_operation'){
            
           
            $userID= auth()->user()->id ;
            $records = PackagesOrders::findOrFail($id);
         
            $this->validate($request, [
                'value' => 'required',
                'check_number'=>'required',
               
                
                
            ]);
          if($records->user_id == $userID ){
              
              if( $request->value < $records->remaining ||  $request->value == $records->remaining ){
               
               if($request->value == $records->remaining){
                   $records->update([
                    'paid' => ($records->paid +$request->value),
                    'remaining' => ($records->remaining -$request->value),
                    'status' => 'complete',
                   ]);
                   
                   
                        BrokerPaidUser::create([
                            'order_id' => $id,
                            'broker_id' => $userID,
                             'check_number' => $request->check_number,
                             'value' =>$request->value,
            
                        ]);
                   
        
                flash()->success('Add Success');
                 $model = PackagesOrders::findOrFail($id);
                return view('broker.my_packages_orders.add', compact('model'));
               }else{
                     $records->update([
                    'paid' => ($records->paid +$request->value),
                    'remaining' => ($records->remaining -$request->value),
                   ]);
                   
                   
                        BrokerPaidUser::create([
                            'order_id' => $id,
                            'broker_id' => $userID,
                             'check_number' => $request->check_number,
                             'value' =>$request->value,
            
                        ]);
                   
        
                flash()->success('Add Success');
                 $model = PackagesOrders::findOrFail($id);
                return view('broker.my_packages_orders.add', compact('model')); 
               }
                  
                 
         
              
              }else{
                  
                flash()->error('This value is greater than the remaining');
                return redirect()->back();
              }
              
        
            }else{
                  flash()->error('You Can`t Edit This Order You Not Owner');
                  return redirect()->back();
             
            } 
        }
        else{
            $userID= auth()->user()->id ;
            $records = PackagesOrders::findOrFail($id);
            
            $this->validate($request, [
                'status' => 'required',
            ]);
          if($records->user_id == $userID ){
            $records->update([
                    'status' => $request->status,
                ]);
        
        
                flash()->success('Edit Success');
                return redirect()->back();
            }else{
                return "You Can`t Edit This Order You Not Owner";
            } 
        }
       
       
    }
    
    


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        PackagesOrders::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
