<?php

namespace App\Http\Controllers\Broker;



use App\models\Hotel;
use App\models\OrderHotels;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use Illuminate\Routing\Redirector;

class MyOrderHotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
        $userID= auth()->user()->id ;
        $records=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->where('order_hotel.user_id','=',$userID)
            ->select('order_hotel.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.id as order_id')
            ->paginate(20);
        // dd($records);

        return view('broker.my_order_hotel.index', compact('records'));

//        $records = OrderHotels::orderBy('id', 'desc')->paginate(20);
//        return view('admin.order_hotels.index', compact('records'));
    }
    public function spicificOrder($status='pending')
    {
        $totalSales='';
        if($status == 'complete'){
            $totalhotelsprice = DB::select("SELECT sum(um.price) as totoal FROM `hotel_rooms` um LEFT JOIN order_hotel po on(um.id=po.hotel_room_id) WHERE po.status='complete'");
            if ($totalhotelsprice[0]->totoal == null) {
                $totalSales = 0;
            } else {
                $totalSales = $totalhotelsprice[0]->totoal;
            }
        }
        $records=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->join('users','users.id','order_hotel.user_id')
            ->where('order_hotel.status','=',$status)
            ->select('users.*','order_hotel.*','hotel_rooms.*','hotels.name as hotelsname')
            ->paginate(20);
//        dd($records);

        return view('admin.order_hotels.index', compact('records','status','totalSales'));

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
        
      
        $userID= auth()->user()->id ;
        $model=DB::table('order_hotel')
            ->join('hotels','hotels.id','order_hotel.hotel_id')
            ->join('hotel_rooms','hotel_rooms.id','order_hotel.hotel_room_id')
            ->where('order_hotel.user_id','=',$userID)->where('order_hotel.id','=',$id)
            ->select('order_hotel.*','hotel_rooms.*','hotels.name as hotelsname','order_hotel.id as order_id')
            ->first();
            
            if($model !=null){
                $fdate = $model->reserve_from;
                $tdate = $model->reserve_to;
                $datetime1 = new DateTime($fdate);
                $datetime2 = new DateTime($tdate);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%a');

                    if($days > 0){
                    }else{
                        $days=1;
                    }
                $tootalPrice=($model->price*$days);
                $model->number_days=$days;
                $model->total_price=$tootalPrice;
            }
            
            
        //  dd($model);

        return view('broker.my_order_hotel.show', compact('model'));
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $model = OrderHotels::findOrFail($id);
        return view('admin.order_hotels.edit', compact('model'));
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
        $records = OrderHotels::findOrFail($id);
        $this->validate($request, [
            'status' => 'required',
        ]);

        $records->update([
            'status' => $request->status,
        ]);


        flash()->success('Edit Success');
        return redirect(route('order_hotels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {

        OrderHotels::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
