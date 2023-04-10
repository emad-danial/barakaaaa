<?php

namespace App\Http\Controllers\Admin;

use App\models\PackageInclude;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

class IncludesController extends Controller
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
        $records = PackageInclude::paginate(20);
        return view('admin.packages_includes.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.packages_includes.create');
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
            'icon' => 'required|image',
        ]);

        $record = PackageInclude::create($request->all());

        if ( $request->hasFile('icon')  ) {
//            dd($records->name);
            $icon = $request->icon;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $icon->move('uploads/include', $icon_new_name);

            $record->icon = 'uploads/include/'.$icon_new_name;
            $record->save();
        }
        flash()->success('Create Success');
        return redirect(route('includes.index'));
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
        $model = PackageInclude::findOrFail($id);
        return view('admin.packages_includes.edit', compact('model'));
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
        $records = PackageInclude::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'image',
        ]);


        $records->update($request->except('icon'));

        if ( $request->hasFile('icon')  ) {
//            dd($records->name);
            $icon = $request->icon;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $icon->move('uploads/include', $icon_new_name);

            $records->icon = 'uploads/include/'.$icon_new_name;
            $records->save();
        }

        flash()->success('Edit Success');
        return redirect(route('includes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        PackageInclude::find($id)->delete();
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
