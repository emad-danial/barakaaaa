<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDatatable;

use App\models\BrokerPaid;
use App\models\BrokerCommission;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use DB;

class BrokersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(UserDatatable $admin)
    {
        //
        
        return $admin->render('admin.brokers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brokers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile'=>['required','numeric','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'type' => 'required',
            'commission' => 'required',
            'company_name' => 'required',
        ]);

//        dd($request);

        $record = User::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'mobile' => $request['mobile'],
        'email' => $request['email'],
        'type' => $request['type'],
        'company_name' => $request['company_name'],
        'password' => Hash::make($request['password']),
    ]);

        if($record->id){
            BrokerCommission::create([
                'user_id' => $record->id,
                'commission' => $request->commission,
                 'company_name' => $request->company_name,

            ]);
            
           $GLOBALS['email']=$request['email'];
             Mail::send('admin.emails.regestration',['name'=> $request->company_name ,'email'=> $request['email'],'password'=> $request['password']], function ($message) {
        		          $message->from(emailSender(), 'Registration Broker Success');
        		          $message->subject('Registration Success');
        		          $message->to($GLOBALS['email']);
              });
             
            
            
        }
        
         if ( $request->hasFile('image')  ) {

            $icon = $request->image;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $icon->move('uploads/users', $icon_new_name);
            $record->image = 'uploads/users/'.$icon_new_name;
            $record->save();
        }

        flash()->success('Create Success');
        return redirect(route('brokers.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $model = User::findOrFail($id);
        $commission = BrokerCommission::where('user_id', $id)->first();
        
         $companyName='';
         $brokercommition=0;
           if($commission->company_name !=null){
               $companyName=$commission->company_name;
           }
            if($commission->commission !=null && $commission->commission >0){
               $brokercommition=$commission->commission;
           }
       
        
         $ordersUmrh = DB::table('orders_package')
            ->leftJoin('umarh_pricing', 'orders_package.package_pricing_id','=', 'umarh_pricing.id')
            ->leftJoin('umrahs','umarh_pricing.umarh_id', '=', 'umrahs.id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type', '=', 'umar')->where('orders_package.user_id', '=', $id)
            ->select('orders_persons.first_name as person_first_name','orders_persons.last_name as person_last_name','orders_package.*','umrahs.package_type','umrahs.name as package_name','umarh_pricing.price','umarh_pricing.name as room_name')->orderBy('orders_package.id', 'DESC')
->paginate(20000000);
       
            
        $ordersHajj = DB::table('orders_package')
            ->leftJoin('umarh_pricing', 'orders_package.package_pricing_id','=', 'umarh_pricing.id')
            ->leftJoin('umrahs','umarh_pricing.umarh_id', '=', 'umrahs.id')
            ->join('orders_persons','orders_persons.order_package_id','orders_package.id')
            ->where('umrahs.package_type', '=', 'hajj')->where('orders_package.user_id', '=', $id)
            ->select('orders_persons.first_name as person_first_name','orders_persons.last_name as person_last_name','orders_package.*','umrahs.package_type','umrahs.name as package_name','umarh_pricing.price','umarh_pricing.name as room_name')->orderBy('orders_package.id', 'DESC')
->paginate(20000000);
         
        
        $totalumrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE u.package_type ='umar' AND po.user_id ='{$id}' " );
        $totalhajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE  u.package_type ='hajj' AND po.user_id ='{$id}' ");
   
   
     if ($totalumrahprice[0]->totoal == null) {
            $umrahprice = 0;
        } else {
            $umrahprice = $totalumrahprice[0]->totoal;
        }
        if ($totalhajjprice[0]->totoal == null) {
            $hajjprice = 0;
        } else {
            $hajjprice = $totalhajjprice[0]->totoal;
        }
        
          $total_sales = ($umrahprice + $hajjprice);
          $tootalCom=($total_sales*$brokercommition/100);
          $totalshodpaid=(($total_sales) - ($total_sales*$brokercommition/100));
          $total_paid=BrokerPaid::where('user_id',$id)->get()->sum("value");
          $Financialoperations=BrokerPaid::where('user_id',$id)->orderBy('id', 'desc')->paginate(20000000000);

         
         $remaining=($totalshodpaid-$total_paid);
        
        
         return view('admin.brokers.show', compact('model', 'commission','ordersUmrh','ordersHajj','total_sales','totalshodpaid','brokercommition','total_paid','remaining','companyName','umrahprice','hajjprice','Financialoperations','id','tootalCom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
     
      public function add($id)
    {
        
        $model = User::findOrFail($id);
        $commission = BrokerCommission::where('user_id', $id)->first();
            
         $brokercommition=0;
          
            if($commission->commission !=null && $commission->commission >0){
               $brokercommition=$commission->commission;
           }

        
        $totalumrahprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE u.package_type ='umar' AND po.user_id ='{$id}' " );
        $totalhajjprice = DB::select("SELECT sum(um.price) as totoal FROM `umarh_pricing` um LEFT JOIN orders_package po on(um.id=po.package_pricing_id) LEFT JOIN umrahs u on(um.umarh_id=u.id) WHERE  u.package_type ='hajj' AND po.user_id ='{$id}' ");
   
   
     if ($totalumrahprice[0]->totoal == null) {
            $umrahprice = 0;
        } else {
            $umrahprice = $totalumrahprice[0]->totoal;
        }
        if ($totalhajjprice[0]->totoal == null) {
            $hajjprice = 0;
        } else {
            $hajjprice = $totalhajjprice[0]->totoal;
        }
        
          $total_sales = ($umrahprice + $hajjprice);
          $totalshodpaid=(($total_sales) - ($total_sales*$brokercommition/100));
          $total_paid=BrokerPaid::where('user_id',$id)->get()->sum("value");
         $remaining=($totalshodpaid-$total_paid);

        return view('admin.brokers.add', compact('model', 'commission','totalshodpaid','remaining','id','total_paid'));
    }
  
     public function edit($id)
    {
       
        
        $model = User::findOrFail($id);
        $commission = BrokerCommission::where('user_id', $id)->first();
//        $commission=BrokerCommission::where('user_id', $id);
//dd($commission);
        return view('admin.brokers.edit', compact('model', 'commission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        
         if($request->typeupdate == 'financial_operation'){
                $this->validate($request, [
                  'value' => ['required'],
                  'check_number' => ['required'],
                ]);

                if($request->value <= $request->remaining){
                     BrokerPaid::create([
                        'user_id' => $id,
                        'value' => $request->value,
                        'check_number' => $request->check_number,

                    ]);
                    flash()->success('Add Success');
                 return redirect()->back();

                }
                else{
                    flash()->error('This value is greater than the remaining');
                    return redirect()->back();
                }



         }else{
              
        $records = User::findOrFail($id);
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile'=>['required','numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'commission' => 'required',
             'company_name' => 'required',
        ]);

        if($request['password'] !==''){
            $request['password'] =Hash::make($request['password']);

            $records->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'password' => $request->password,
            ]);
        }else{
            $records->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                 'company_name' => $request->company_name,
                'email' => $request->email,
            ]);
        }

                $brokercommisson = BrokerCommission::where('user_id', $id)->first();
                if ($brokercommisson != null) {
                    $brokercommisson->update([
                        'commission' => $request->commission,
                        'company_name' => $request->company_name,

                    ]);
                } else {
                    BrokerCommission::create([
                        'user_id' => $records->id,
                        'commission' => $request->commission,
                        'company_name' => $request->company_name,

                    ]);
                }
                
                 if ( $request->hasFile('image')  ) {

            $icon = $request->image;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $icon->move('uploads/users', $icon_new_name);
            $records->image = 'uploads/users/'.$icon_new_name;
            $records->save();
        }

        flash()->success('Update Success');
        return redirect(route('brokers.index')); 
         }
        
        
        
      
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id) != null){
             BrokerCommission::where('user_id',$id)->delete();
             User::find($id)->delete();
        }
        
        
        flash()->error('Success Deleted');
        return redirect(url('admin/brokers'));
    }
}
