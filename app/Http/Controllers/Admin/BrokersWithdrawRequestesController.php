<?php

namespace App\Http\Controllers\Admin;

use App\models\BrokerWithdraw;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Routing\Redirector;

class BrokersWithdrawRequestesController extends Controller
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

        $records=DB::table('broker_withdraw')
            ->join('users','users.id','broker_withdraw.user_id')
            ->select('users.*','broker_withdraw.*')
            ->paginate(20);

//        $records = BrokerWithdraw::paginate(20);
        return view('admin.broker_withdrawal_requests.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user_id= auth()->user()->id ;
        return view('admin.broker_withdrawal_requests.create',compact('user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'value' => 'required',

        ]);

        $record = BrokerWithdraw::create($request->all());

        flash()->success('Create Success');
        return redirect(route('broker_withdrawal_requests.index'));
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
        return view('admin.broker_withdrawal_requests.edit', compact('model'));
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
            'status' => 'required',
        ]);

        $records->update($request->all());

        flash()->success('Edit Success');
        return redirect(route('broker_withdrawal_requests.index'));
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
