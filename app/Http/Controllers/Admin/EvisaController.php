<?php

namespace App\Http\Controllers\Admin;


use App\models\OrderHotels;
use App\models\evisa;
use App\models\evisa_detail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\website\eVisaController as sendemail; 
use DB;
use Mail;
use Illuminate\Routing\Redirector;

class EvisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
   
   
   
      public function index()
    {
        $status="pending";
        $records=DB::select("SELECT e.*,(select count(id) from evisa_detail where evisa_id = e.id ) as num_of_persons FROM evisa e where e.status='{$status}' ORDER BY e.id DESC");
        return view('admin.evisa.index', compact('records','status'));
    }

     public function spicificDeliveredOrder()
    {

        $status="delivered";
        $records=DB::select("SELECT e.*,(select count(id) from evisa_detail where evisa_id = e.id ) as num_of_persons FROM evisa e where e.status='{$status}' OR e.status='paymentComplete' ORDER BY e.id DESC ");

        return view('admin.evisa.index', compact('records','status'));
    }
 public function spicificPendingOrder()
    {
      
        $status='pending';
        $records=DB::select("SELECT e.*,(select count(id) from evisa_detail where evisa_id = e.id ) as num_of_persons FROM evisa e where e.status='{$status}' ORDER BY e.id DESC");


        return view('admin.evisa.index', compact('records','status'));
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
        $model = evisa::findOrFail($id);
        $persons = evisa_detail::where('evisa_id',$id)->get();

        $total=0;
        $count=0;
        foreach($persons as $key){
            if($key->passport_type == "USACanadian")  {               $total=$total+200; $type="USACanadian"; }
            elseif($key->passport_type == "IndianPakistani"){         $total=$total+400; $type="IndianPakistani";}
            elseif($key->passport_type == "Bangladeshi")     {        $total=$total+400; $type="Bangladeshi"; }
            $count++;
        }
        $fees=$total*(3/100);
        $totalAmount=$fees+$total;

//      dd($totalAmount);
        return view('admin.evisa.show', compact('model','persons','fees','totalAmount','total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

         $model = evisa::findOrFail($id);
        return view('admin.evisa.edit', compact('model'));
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
       
       
         $records = evisa::findOrFail($id);
       
        $this->validate($request, [
            'status' => 'required',
        ]);

        $records->update([
            'status' => $request->status,
        ]);


 $GLOBALS['email']=$records->email;

if($request->status == 'delivered'){
    
    $evisa=$id;
    
    $evisa=evisa::find($evisa);
	    $evisaDetail=evisa_detail::where('evisa_id','=',$evisa->id)->get();
        
        $total=0;
        $count=0;
        foreach($evisaDetail as $key){
            if($key->passport_type == "USACanadian")  {               $total=$total+200; $type="USACanadian"; }
            elseif($key->passport_type == "IndianPakistani"){         $total=$total+400; $type="IndianPakistani";}
            elseif($key->passport_type == "Bangladeshi")     {        $total=$total+400; $type="Bangladeshi"; }
            $count++;
        }
        
        
        $fees=$total*(3/100);
        $totalAmount=$fees+$total;
        $email=$evisa->email;
        $numberOfPersons=evisa_detail::where('evisa_id','=',$evisa->id)->count();
        
        // in that area we will send an email
        sendemail::sendEmail($email,$evisa,$numberOfPersons,$total,$fees,$totalAmount);
    
    
    //  Mail::send('admin.emails.emailcontact',['name'=>"name"], function ($message) {
    //     		          $message->from('baraka@b1e87ed86e3071513.temporary.link', 'E-Visa Order');
    //     		          $message->subject('Payment Success');
    //     		          $message->to($GLOBALS['email']);
    //     });
 
}
      
        
        flash()->success('Edit Success');
        return redirect(route('evisa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        if(evisa::find($id) != null){
              evisa::find($id)->delete();
               DB::table('evisa_detail')->where('evisa_id',$id)->delete();
        }

        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
