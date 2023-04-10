<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FlightsDatatable;
use App\DataTables\UmrahDatatable;
use App\Http\Requests\UmrahRequest;
use App\models\PackageInclude;
use App\models\UmarhDetail;
use App\models\UmarhStopOver;
use App\models\Flight;
use App\models\UmarhGallery;
use App\models\UmarhDay;
use App\models\UmrahHaagIncludes;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Intervention\Image\Facades\Image as Image;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(FlightsDatatable $admin)
    {
        //
        return $admin->render('admin.flights.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $include = PackageInclude::all();
//        dd($include);
        return view('admin.flights.create');
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
            'flight_name' => 'required',
            'flight_company' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'reservation_from' => 'required',
            'reservation_to' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'price_ch' => 'required',
           
        ]);

        $record = Flight::create($request->all());

         if ( $request->hasFile('image')  ) {
//            dd($records->name);
             $icon = $request->image;
//             $icon_new_name = time() . $icon->getClientOriginalName();
//             $icon->move('uploads/flight', $icon_new_name);

             $icon_new_name = time() . $icon->getClientOriginalName();
             $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../uploads/flight/'  .  $icon_new_name . '.webp'));
             $nameimg ='uploads/flight/'  .  $icon_new_name . '.webp';


             $record->image = $nameimg;
             $record->save();
         }
        flash()->success('Create Success');
       
        return redirect(url('admin/flights'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $model = Flight::findOrFail($id);

        return view('admin.flights.edit', compact('model'));
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
        $records = Flight::findOrFail($id);
        $this->validate($request, [
            'flight_name' => 'required',
            'flight_company' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'reservation_from' => 'required',
            'reservation_to' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_ch' => 'required',
           
        ]);

        $records->update($request->except('image'));

        if ($records) {
             if($request->file('image') !=null){

                $file=$request->file('image');
//                $icon_new_name = time() . $file->getClientOriginalName();
//                $file->move('uploads/flight', $icon_new_name);
//

                 $icon_new_name = time() . $file->getClientOriginalName();
                 $image = Image::make($file)->encode('webp', 80)->save(public_path('../../uploads/flight/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/flight/'  .  $icon_new_name . '.webp';


                 $records->image = $nameimg;
                 $records->save();
             }
        }


        flash()->success('Update Success');
       return redirect(url('admin/flights'));
        
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Flight::find($id) != null){
             Flight::find($id)->delete();
              DB::table('user_flight')->where('flight_id',$id)->delete();
         }
        
        flash()->error('Success Deleted');
        return redirect(url('admin/flights'));
    }
}
