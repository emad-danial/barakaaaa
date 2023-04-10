<?php

namespace App\Http\Controllers\Broker;

use App\DataTables\HotelsBrokerDatatable;
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

class HotelsBrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AdminDatatable $admin
     * @return void
     */
    public function index(HotelsBrokerDatatable $admin)
    {
        //
        return $admin->render('broker.hotels.index');
    }


    public function show($id)
    {
        $model = Hotel::findOrFail($id);
        $amenitie = Amenities::all();
        $hotelamenate = HotelsAmenities::where('hotel_id', $id)->get();
        $hotelRooms = HotelRooms::where('hotel_id', $id)->get();
        $hotelGallary = HotelGallery::where('hotel_id', $id)->get();
        return view('broker.hotels.show', compact('model', 'amenitie', 'hotelamenate', 'hotelRooms', 'hotelGallary'));
    }

 public function destroy($id)
    {
        Hotel::find($id)->delete();
        flash()->error('Success Deleted');
        return redirect(url('admin/hotels'));
    }

}
