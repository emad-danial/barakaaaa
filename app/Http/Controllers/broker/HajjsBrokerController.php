<?php

namespace App\Http\Controllers\Broker;

use App\DataTables\HajjBrokerDatatable;
use App\DataTables\HajjDatatable;

use App\Http\Requests\UmrahRequest;
use App\models\PackageInclude;
use App\models\UmarhDetail;
use App\models\UmarhStopOver;
use App\models\Umrah;
use App\models\UmarhGallery;
use App\models\UmarhDay;
use App\models\UmrahHaagIncludes;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HajjsBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(HajjBrokerDatatable $admin)
    {

        return $admin->render('broker.hajjs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Umrah::findOrFail($id);
        $include = PackageInclude::all();
        $umarhDetails = UmarhDetail::where('umarh_id', $id)->first();
        $umrahHaagIncludes = UmrahHaagIncludes::where('umarh_id', $id)->get();
        $umarhDays = UmarhDay::where('umarh_id', $id)->get();
        $umarhPricies = UmrahPricing::where('umarh_id', $id)->get();
        $umarhGallery = UmarhGallery::where('umrah_id', $id)->get();
        $umarhStopOver = '';
        if ($model->type == 'stop_over') {
            $umarhStopOver = UmarhStopOver::where('umarh_id', $id)->first();
        }

        return view('broker.hajjs.show', compact('model', 'include', 'umarhDetails', 'umrahHaagIncludes', 'umarhDays', 'umarhPricies', 'umarhGallery', 'umarhStopOver'));
    }
     public function destroy($id)
    {
        Umrah::find($id)->delete();
        flash()->error('Success Deleted');
       return redirect(url('admin/hajjs'));
    }

}
