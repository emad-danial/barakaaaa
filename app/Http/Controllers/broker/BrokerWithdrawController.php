<?php

namespace App\Http\Controllers\Broker;

use App\models\BrokerWithdraw;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;
use App\models\BrokerBonuses;

class BrokerWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
        //
        $userID= auth()->user()->id ;
        $records = BrokerWithdraw::where('user_id','=',$userID)->paginate(20);
        return view('broker.broker_withdraw.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user_id= auth()->user()->id ;
        return view('broker.broker_withdraw.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

         $userID= auth()->user()->id ;

        $Umrahbonuses=BrokerBonuses::where('order_type','umar')->where('user_id',$userID)->get()->sum("commission");
        $Hajjbonuses=BrokerBonuses::where('order_type','hajj')->where('user_id',$userID)->get()->sum("commission");
        $Hotelbonuses=BrokerBonuses::where('order_type','hotel')->where('user_id',$userID)->get()->sum("commission");
        $Flightbonuses=BrokerBonuses::where('order_type','flight')->where('user_id',$userID)->get()->sum("commission");
        $totalbonuses=$Umrahbonuses+$Hajjbonuses+$Hotelbonuses+$Flightbonuses;
        $totalwithdrow = BrokerWithdraw::where('user_id','=',$userID)->where('status','=','completed')->get()->sum("value");
        $avalible=($totalbonuses-$totalwithdrow);
        $this->validate($request, [
            'value' => 'required',
        ]);
        if($request->value > $avalible){
            flash()->error('You don’t have balance with us');
             return redirect()->back();
        }else{
            $record = BrokerWithdraw::create($request->all());
            flash()->success('Create Success');
            return redirect(route('broker_withdraw.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $model = BrokerWithdraw::findOrFail($id);
        return view('broker.broker_withdraw.edit', compact('model'));
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
        $records = BrokerWithdraw::findOrFail($id);
        $this->validate($request, [
            'value' => 'required',
        ]);


        $records->update($request->all());
        

        flash()->success('Edit Success');
        return redirect(route('broker_withdraw.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        BrokerWithdraw::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
