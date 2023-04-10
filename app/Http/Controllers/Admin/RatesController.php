<?php

namespace App\Http\Controllers\Admin;


use App\models\Rate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

class RatesController extends Controller
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
        $records = Rate::orderBy('id', 'desc')->paginate(20);
        return view('admin.rates.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.rates.create');
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
            'is_approve' => 'required',
        ]);

        $record = Rate::create($request->all());
        $record->save();

        flash()->success('Create Success');
        return redirect(route('rates.index'));
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
        $model = Rate::findOrFail($id);
        return view('admin.rates.edit', compact('model'));
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
        $records = Rate::findOrFail($id);
        $this->validate($request, [
            'is_approve' => 'required',
        ]);

// //dd($request);

        $records->update([
            'is_approve' => $request['is_approve'],
        ]);
        

        flash()->success('Edit Success');
        return redirect(route('rates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Rate::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
