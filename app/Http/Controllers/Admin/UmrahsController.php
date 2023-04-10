<?php

namespace App\Http\Controllers\Admin;

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
use DB;

use Intervention\Image\Facades\Image as Image;

class UmrahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(UmrahDatatable $admin)
    {
        //
        return $admin->render('admin.umrahs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $include = PackageInclude::all();
//        dd($include);
        return view('admin.umrahs.create', compact('include'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UmrahRequest $request)
    {
        $input = $request->all();

        $record = Umrah::create($input);

        if ($record) {


            for ($i = 1; $i <= $request->dayes_count; $i++) {
                if(request('day_name_' . $i) !=''&&request('day_desciption_' . $i) !=''&&request('day_number_' . $i) !=''){
                UmarhDay::create([
                    'umarh_id' => $record->id,
                    'name' => request('day_name_' . $i),
                    'desciption' => request('day_desciption_' . $i),
                    'day_number' => request('day_number_' . $i),
                ]);
                }
            }

            for ($i = 1; $i <= $request->price_count; $i++) {
                if(request('price_name_' . $i) !='' && request('number_per_room_' . $i) !=''&&request('price_' . $i) !='') {
                    UmrahPricing::create([
                        'umarh_id' => $record->id,
                        'name' => request('price_name_' . $i),
                        'number_per_room' => request('number_per_room_' . $i),
                        'price' => request('price_' . $i),
                    ]);
                }
            }

            UmarhDetail::create([
                'umarh_id' => $record->id,
                'included' => $request->included,
                'not_selected' => $request->not_selected,
                'important_notes' => $request->important_notes,
                'how_to_book' => $request->how_to_book,
            ]);

            if($request->type == 'stop_over'&& $request->city_transit!='' &&$request->start_date_transit!='' && $request->end_date_transit!=''&& $request->description_transit !=''){
                UmarhStopOver::create([
                    'umarh_id' => $record->id,
                    'city' => $request->city_transit,
                    'start_date' => $request->start_date_transit,
                    'end_date' => $request->end_date_transit,
                    'description' => $request->description_transit,
                ]);
            }


            foreach ($request->include as $includes) {
                UmrahHaagIncludes::create([
                    'umarh_id' => $record->id,
                    'packages_includes_id' => $includes,
                ]);

            }

             foreach ($request->file('files') as $file) {

                $icon_new_name = time() . $file->getClientOriginalName();
                 $image = Image::make($file)->encode('webp', 80)->save(public_path('../../uploads/umrahgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/umrahgallary/'  .  $icon_new_name . '.webp';

                UmarhGallery::create([
                    'umrah_id' => $record->id,
                    'image' => $nameimg,
                ]);
            }
        }
        flash()->success('Create Success');
        return redirect(url('admin/umrahs'));

    }

    function webp_image($image, $quality = 100)
    {
        if (!$image) {
            return null;
        }

        $imageResize = Image::make($image)->encode('webp', $quality);
        $name = time() . rand(1, 100000) . '.webp';

        return ['name' => $name, 'image' => $imageResize];
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

        return view('admin.umrahs.edit', compact('model', 'include', 'umarhDetails', 'umrahHaagIncludes', 'umarhDays', 'umarhPricies', 'umarhGallery', 'umarhStopOver'));
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
        $records = Umrah::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'from_city' => 'required',
            'to_city' => 'required',
            'makkah_desciption' => 'required',
            'madina_desciption' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required|in:active,dsiactive',
            'type' => 'required|in:regular,stop_over',
            'package_type' => 'required|in:umar,hajj',
            'is_offer' => 'nullable',
            'files.*' => 'nullable|image',
            'files' => 'nullable|array|max:20',
            'included' => 'required',
            'not_selected' => 'required',
            'important_notes' => 'required',
            'how_to_book' => 'required',
            'city_transit' => 'nullable',
            'start_date_transit' => 'nullable',
            'end_date_transit' => 'nullable',
            'description_transit' => 'nullable',
            'day_name_1' => 'required',
            'day_desciption_1' => 'required',
            'day_number_1' => 'required',
            'price_name_1' => 'required',
            'number_per_room_1' => 'required',
            'price_1' => 'required',
        ]);

        $records->update($request->all());

        if ($records) {
             if($request->file('files') !=null){
            foreach ($request->file('files') as $file) {
//                $icon_new_name = time() . $file->getClientOriginalName();
//                $file->move('uploads/umrahgallary', $icon_new_name);
//                $nameimg = 'uploads/umrahgallary/'.$icon_new_name;

                $icon_new_name = time() . $file->getClientOriginalName();
                $image = Image::make($file)->encode('webp', 80)->save(public_path('../../uploads/umrahgallary/'  .  $icon_new_name . '.webp'));
                $nameimg ='uploads/umrahgallary/'  .  $icon_new_name . '.webp';


                UmarhGallery::create([
                    'umrah_id' => $records->id,
                    'image' => $nameimg,
                ]);
            }
                 
             }

            UmarhDay::where('umarh_id', $id)->delete();
            for ($i = 1; $i <= $request->dayes_count; $i++) {
                if(request('day_name_' . $i) !=''&&request('day_desciption_' . $i) !=''&&request('day_number_' . $i) !=''){
                    UmarhDay::create([
                        'umarh_id' => $records->id,
                        'name' => request('day_name_' . $i),
                        'desciption' => request('day_desciption_' . $i),
                        'day_number' => request('day_number_' . $i),
                    ]);
                }
            }

            UmrahPricing::where('umarh_id', $id)->delete();
            for ($i = 1; $i <= $request->price_count; $i++) {
                if(request('price_name_' . $i) !='' && request('number_per_room_' . $i) !=''&&request('price_' . $i) !='') {
                    UmrahPricing::create([
                        'umarh_id' => $records->id,
                        'name' => request('price_name_' . $i),
                        'number_per_room' => request('number_per_room_' . $i),
                        'price' => request('price_' . $i),
                    ]);
                }
            }

            $umarhDetails = UmarhDetail::where('umarh_id', $id)->first();
            $umarhDetails->update([
                'included' => $request->included,
                'not_selected' => $request->not_selected,
                'important_notes' => $request->important_notes,
                'how_to_book' => $request->how_to_book,
            ]);

            if($request->type == 'stop_over'&& $request->city_transit!='' &&$request->start_date_transit!='' && $request->end_date_transit!=''&& $request->description_transit !=''){
                $umarhStopOver = UmarhStopOver::where('umarh_id', $id)->first();
                if ($umarhStopOver != null) {
                    $umarhStopOver->update([
                        'city' => $request->city_transit,
                        'start_date' => $request->start_date_transit,
                        'end_date' => $request->end_date_transit,
                        'description' => $request->description_transit,
                    ]);
                } else {
                    UmarhStopOver::create([
                        'umarh_id' => $records->id,
                        'city' => $request->city_transit,
                        'start_date' => $request->start_date_transit,
                        'end_date' => $request->end_date_transit,
                        'description' => $request->description_transit,
                    ]);
                }
            }

            UmrahHaagIncludes::where('umarh_id', $id)->delete();
            foreach ($request->include as $includes) {
                UmrahHaagIncludes::create([
                    'umarh_id' => $records->id,
                    'packages_includes_id' => $includes,
                ]);

            }
        }
        flash()->success('Update Success');
        return redirect(url('admin/umrahs'));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         if(Umrah::find($id) != null){
            
              $prices = DB::table('umarh_pricing')
                ->select('id')->where('umarh_id',$id)
                ->get();
                
              foreach($prices as $r){
                //   echo $r->id;
                  DB::table('orders_package')->where('package_pricing_id',$r->id)->delete();
                 }
            
             Umrah::find($id)->delete();
        }
        flash()->error('Success Deleted');
        return redirect(url('admin/umrahs'));
    }
}
