<?php

namespace App\Http\Controllers\Broker;

use App\DataTables\UmrahBrokerDatatable;
use App\DataTables\UmrahDatatable;
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

class UmrahsBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(UmrahBrokerDatatable $admin)
    {

        return $admin->render('broker.umrahs.index');
    }
     public function index2(UmrahBrokerDatatable $admin)
    {

        return $admin->render('admin.umrahs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
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

        return view('broker.umrahs.show', compact('model', 'include', 'umarhDetails', 'umrahHaagIncludes', 'umarhDays', 'umarhPricies', 'umarhGallery', 'umarhStopOver'));
    }
    
    public function destroy($id)
    {
       
        Umrah::find($id)->delete();
        flash()->error('Success Deleted');
   return redirect()->back();
    }

}
