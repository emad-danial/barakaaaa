<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HotelsDatatable;
use App\Http\Requests\UmrahRequest;
use App\models\Amenities;
use App\models\HotelsAmenities;
use App\models\Hotel;
use App\models\UmarhDetail;
use App\models\UmarhStopOver;
use App\models\Umrah;
use App\models\HotelGallery;
use App\models\HotelRooms;
use App\models\UmarhDay;
use App\models\UmrahHaagIncludes;
use App\models\UmrahPricing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Intervention\Image\Facades\Image as Image;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(HotelsDatatable $admin)
    {
        //
        return $admin->render('admin.hotels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenitie = Amenities::all();
//        dd($amenitie);
        return view('admin.hotels.create', compact('amenitie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd(base_path().'/uploads/hotelgallary/');

        $this->validate($request, [
            'name' => 'required',
            'duration' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'description' => 'required',
            'location' => 'required',
            'address' => 'required',
            'availble_tickets' => 'required',
            'book_now_img' => 'required|image',
            'files.*' => 'required|image',
            'files' => 'required|array|max:20',
            'room_name_1' => 'required',
            'room_includes_1' => 'required',
            'room_maxinum_1' => 'required',
            'room_price_1' => 'required',
            'room_image_1' => 'required',
             'from_date_1' => 'required',
            'to_date_1' => 'required',

        ]);

        $record = Hotel::create($request->all());
        if ($record) {

            if ($request->hasFile('book_now_img')) {
                $icon = $request->book_now_img;
//                $icon_new_name = time() . $icon->getClientOriginalName();
//                $icon->move('uploads/hotelgallary', $icon_new_name);

                // $icon_new_name = time() . $icon->getClientOriginalName();
                // $image = Image::make($icon)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';

                 $icon_new_name = time() . $icon->getClientOriginalName();
                 $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';




                $record->book_now_img = $nameimg;
                $record->save();
            }


            for ($i = 1; $i <= $request->rooms_count; $i++) {
                if (request('room_name_' . $i) != '' && request('room_includes_' . $i) != '' && request('room_maxinum_' . $i) != '' && request('room_price_' . $i) != '') {
                    $room = HotelRooms::create([
                        'hotel_id' => $record->id,
                        'name' => request('room_name_' . $i),
                        'includes' => request('room_includes_' . $i),
                        'maxinum' => request('room_maxinum_' . $i),
                        'price' => request('room_price_' . $i),
                         'from_date' => request('from_date_' . $i),
                        'to_date' => request('to_date_' . $i),
                    ]);

                    if ($request->hasFile('room_image_'. $i)&& $room != null) {
                        $icon = request('room_image_' . $i);
//                        $icon_new_name = time() . $icon->getClientOriginalName();
//                        $icon->move('uploads/hotelgallary', $icon_new_name);

                        // $icon_new_name = time() . $icon->getClientOriginalName();
                        // $image = Image::make($icon)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                        // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


 $icon_new_name = time() . $icon->getClientOriginalName();
                 $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


                        $room->room_image = $nameimg;
                        $room->save();
                    }
                }
            }


            if ($request->amenitie != null) {
                foreach ($request->amenitie as $ameniti) {
                    HotelsAmenities::create([
                        'hotel_id' => $record->id,
                        'amenities_id' => $ameniti,
                    ]);
                }
            }


            foreach ($request->file('files') as $file) {
//                $icon_new_name = time() . $file->getClientOriginalName();
//                $file->move('uploads/hotelgallary', $icon_new_name);
//                $nameimg = 'uploads/hotelgallary/' . $icon_new_name;

                // $icon_new_name = time() . $file->getClientOriginalName();
                // $image = Image::make($file)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';

                 $icon_new_name = time() . $file->getClientOriginalName();
                 $image = Image::make($file)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';



                HotelGallery::create([
                    'hotel_id' => $record->id,
                    'image' => $nameimg,
                ]);
            }
        }
        flash()->success('Create Success');
       
        return redirect(url('admin/hotels'));

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
        $model = Hotel::findOrFail($id);
        $amenitie = Amenities::all();
        $hotelamenate = HotelsAmenities::where('hotel_id', $id)->get();
        $hotelRooms = HotelRooms::where('hotel_id', $id)->get();
        $hotelGallary = HotelGallery::where('hotel_id', $id)->get();
        return view('admin.hotels.edit', compact('model', 'amenitie', 'hotelamenate', 'hotelRooms', 'hotelGallary'));
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
        $records = Hotel::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'duration' => 'required',
            'city' => 'required',
            'mobile' => 'required',
            'description' => 'required',
            'location' => 'required',
            'address' => 'required',
            'availble_tickets' => 'required',
            'room_name_1' => 'required',
            'room_includes_1' => 'required',
            'room_maxinum_1' => 'required',
            'room_price_1' => 'required',
             'from_date_1' => 'required',
            'to_date_1' => 'required',
            

        ]);

        $records->update($request->except('book_now_img'));

        if ($records) {
            if ($request->hasFile('book_now_img')) {
                $icon = $request->book_now_img;


                // $icon_new_name = time() . $icon->getClientOriginalName();
                // $image = Image::make($icon)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


 $icon_new_name = time() . $icon->getClientOriginalName();
                 $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


                $records->book_now_img = $nameimg;
                $records->save();
            }
            if ($request->file('files') != null) {
                foreach ($request->file('files') as $file) {
//                    $icon_new_name = time() . $file->getClientOriginalName();
//                    $file->move('uploads/hotelgallary', $icon_new_name);
//                    $nameimg = 'uploads/hotelgallary/' . $icon_new_name;
                    // $icon_new_name = time() . $file->getClientOriginalName();
                    // $image = Image::make($file)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                    // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


 $icon_new_name = time() . $file->getClientOriginalName();
                 $image = Image::make($file)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


                    HotelGallery::create([
                        'hotel_id' => $records->id,
                        'image' => $nameimg,
                    ]);
                }
            }
            HotelsAmenities::where('hotel_id', $id)->delete();
            foreach ($request->amenitie as $amenities) {
                HotelsAmenities::create([
                    'hotel_id' => $records->id,
                    'amenities_id' => $amenities,
                ]);
            }

            for ($i = 1; $i <= $request->rooms_count; $i++) {
                if(request('room_id_' . $i) == null){
                    if (request('room_name_' . $i) != '' && request('room_includes_' . $i) != '' && request('room_maxinum_' . $i) != '' && request('room_price_' . $i) != '') {
                        $room = HotelRooms::create([
                            'hotel_id' => $records->id,
                            'name' => request('room_name_' . $i),
                            'includes' => request('room_includes_' . $i),
                            'maxinum' => request('room_maxinum_' . $i),
                            'price' => request('room_price_' . $i),
                             'from_date' => request('from_date_' . $i),
                            'to_date' => request('to_date_' . $i),
                        ]);

                        if ($request->hasFile('room_image_'. $i)&& $room != null) {
                            $icon = request('room_image_' . $i);
//                            $icon_new_name = time() . $icon->getClientOriginalName();
//                            $icon->move('uploads/hotelgallary', $icon_new_name);

                            // $icon_new_name = time() . $icon->getClientOriginalName();
                            // $image = Image::make($icon)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                            // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';
                            
                            

                 $icon_new_name = time() . $icon->getClientOriginalName();
                 $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


                            $room->room_image = $nameimg;
                            $room->save();
                        }
                    }
                }else{
                    $hotelroom = HotelRooms::where('id', request('room_id_' . $i))->first();

                    if ($hotelroom != null) {
                        $hotelroom->update([
                            'name' => request('room_name_' . $i),
                            'includes' => request('room_includes_' . $i),
                            'maxinum' => request('room_maxinum_' . $i),
                            'price' => request('room_price_' . $i),
                            'from_date' => request('from_date_' . $i),
                            'to_date' => request('to_date_' . $i),
                        ]);
                    }
                    if ($request->hasFile('room_image_'. $i)&& $hotelroom != null) {
                        $icon = request('room_image_' . $i);

                        // $icon_new_name = time() . $icon->getClientOriginalName();
                        // $image = Image::make($icon)->encode('webp', 80)->save(base_path().'/uploads/hotelgallary/'  .  $icon_new_name . '.webp');
                        // $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';


                 $icon_new_name = time() . $icon->getClientOriginalName();
                 $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/hotelgallary/'  .  $icon_new_name . '.webp'));
                 $nameimg ='uploads/hotelgallary/'  .  $icon_new_name . '.webp';



                        $hotelroom->room_image = $nameimg;
                        $hotelroom->save();
                    }
                }
            }
        }
        flash()->success('Update Success');
         return redirect(url('admin/hotels'));
       
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Hotel::find($id) != null){
             Hotel::find($id)->delete();
              DB::table('order_hotel')->where('hotel_id',$id)->delete();
        }
       
        flash()->error('Success Deleted');
        return redirect(url('admin/hotels'));
    }
}
