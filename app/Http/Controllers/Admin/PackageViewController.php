<?php

namespace App\Http\Controllers\Admin;

use App\models\Hotel;
use App\models\OrderHotels;
use App\models\PackagesOrders;
use App\models\PackagesOrdersPersons;
use App\models\Umrah;
use App\models\Flight;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Routing\Redirector;

class PackageViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
        $package='umrah';
        $totalumrahviews = DB::select("SELECT sum(um.view_count) as views FROM `umrahs` um WHERE um.package_type='umar'")[0]->views;
        if ( $totalumrahviews== null) {
            $umrahviews = 0;
        } else {
            $umrahviews = $totalumrahviews;
        }
        $records = Umrah::where('package_type','=','umar')->orderBy('view_count', 'desc')->paginate(10);
        return view('admin.packages_views.index', compact('records','package','umrahviews'));
    }
    public function packageView($package='umrah')
    {
        $totalhajjviews = DB::select("SELECT sum(um.view_count) as views FROM `umrahs` um WHERE um.package_type='hajj'")[0]->views;
        $totalumrahviews = DB::select("SELECT sum(um.view_count) as views FROM `umrahs` um WHERE um.package_type='umar'")[0]->views;
        $totalflightviews = DB::select("SELECT sum(view_count) as views FROM `flights`")[0]->views;
        $totalhotelviews = DB::select("SELECT sum(view_count) as views FROM `hotels`")[0]->views;
        if ( $totalhajjviews== null) {
            $hajjviews = 0;
        } else {
            $hajjviews = $totalhajjviews;
        }
        if ( $totalumrahviews== null) {
            $umrahviews = 0;
        } else {
            $umrahviews = $totalumrahviews;
        }
        if ( $totalflightviews== null) {
            $flightviews = 0;
        } else {
            $flightviews = $totalflightviews;
        }
        if ( $totalhotelviews== null) {
            $hotelviews = 0;
        } else {
            $hotelviews = $totalhotelviews;
        }

        $records=[];
        if($package=='umrah'){
            $records = Umrah::where('package_type','=','umar')->orderBy('view_count', 'desc')->paginate(10);
        }elseif($package=='hajj'){
            $records = Umrah::where('package_type','=','hajj')->orderBy('view_count', 'desc')->paginate(10);
        }elseif($package=='flight'){
            $records = Flight::orderBy('view_count', 'desc')->paginate(10);
        }elseif($package=='hotel'){
            $records = Hotel::orderBy('view_count', 'desc')->paginate(10);
        }

        return view('admin.packages_views.index', compact('records','package','hajjviews','umrahviews','flightviews','hotelviews'));

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
//        $model = PackagesOrders::findOrFail($id);
//        $price = UmrahPricing::findOrFail($model->package_pricing_id);
//        $persons = PackagesOrdersPersons::where('order_package_id',$id)->paginate(1000);
////        dd($persons->count());
//        return view('admin.packages_views.show', compact('model','price','persons'));
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
        return view('admin.packages_views.edit', compact('model'));
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
        return redirect(route('packages_views.index'));
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
