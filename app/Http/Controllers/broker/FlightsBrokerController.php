<?php

namespace App\Http\Controllers\Broker;

use App\DataTables\FlightsBrokerDatatable;
use App\DataTables\FlightsDatatable;

use App\models\Flight;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightsBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(FlightsBrokerDatatable $admin)
    {
        //
        return $admin->render('broker.flights.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        $model = Flight::findOrFail($id);

        return view('broker.flights.show', compact('model'));
    }
    
     public function destroy($id)
    {
        Flight::find($id)->delete();
        flash()->error('Success Deleted');
        return redirect(url('admin/flights'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

}
