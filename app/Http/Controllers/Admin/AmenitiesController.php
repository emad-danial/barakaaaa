<?php

namespace App\Http\Controllers\Admin;



use App\models\Amenities;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

class AmenitiesController extends Controller
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
        $records = Amenities::paginate(20);
        return view('admin.hotels_amenities.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hotels_amenities.create');
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
            'name' => 'required',
        ]);

        $record = Amenities::create($request->all());
        $record->save();

        flash()->success('Create Success');
        return redirect(route('amenities.index'));
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
        $model = Amenities::findOrFail($id);
        return view('admin.hotels_amenities.edit', compact('model'));
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
        $records = Amenities::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',

        ]);


        $records->update($request->except('icon'));
        $records->save();

        flash()->success('Edit Success');
        return redirect(route('amenities.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Amenities::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
