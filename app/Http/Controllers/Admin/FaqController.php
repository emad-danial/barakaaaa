<?php

namespace App\Http\Controllers\Admin;


use App\models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

class FaqController extends Controller
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
        $records = Faq::paginate(20);
        return view('admin.faqs.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.faqs.create');
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        $record = Faq::create($request->all());
        $record->save();

        flash()->success('Create Success');
        return redirect(route('faqs.index'));
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
        $model = Faq::findOrFail($id);
        return view('admin.faqs.edit', compact('model'));
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
        $records = Faq::findOrFail($id);
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',

        ]);


        $records->update($request->except('icon'));
        $records->save();

        flash()->success('Edit Success');
        return redirect(route('faqs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Faq::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
