<?php

namespace App\Http\Controllers\Admin;

use App\models\AppGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

use Intervention\Image\Facades\Image as Image;

class AppGalleryController extends Controller
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
        $records = AppGallery::paginate(20);
        return view('admin.app_gallery.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.app_gallery.create');
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
            'type' => 'required',
            'image' => 'required|image',
        ]);
        $record = AppGallery::create($request->except('image'));
        if ( $request->hasFile('image')  ) {

            $icon = $request->image;
//            $icon_new_name = time() . $icon->getClientOriginalName();
//            $icon->move('uploads/app_gallery', $icon_new_name);
//            $record->image = 'uploads/app_gallery/'.$icon_new_name;

            $icon = $request->image;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/app_gallery/'  .  $icon_new_name . '.webp'));
            $nameimg ='uploads/app_gallery/'  .  $icon_new_name . '.webp';


            $record->image =$nameimg;
            $record->save();
        }
        flash()->success('Create Success');
        return redirect(route('app_gallery.index'));
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
        $model = AppGallery::findOrFail($id);
        return view('admin.app_gallery.edit', compact('model'));
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
        $records = AppGallery::findOrFail($id);
        $this->validate($request, [
            'type' => 'required',
            'image' => 'image',
        ]);


        $records->update($request->except('image'));

        if ( $request->hasFile('image')  ) {
//            dd($records->name);
//            $icon = $request->image;
//            $icon_new_name = time() . $icon->getClientOriginalName();
//            $icon->move('uploads/app_gallery', $icon_new_name);
//
//            $records->image = 'uploads/app_gallery/'.$icon_new_name;
//

            $icon = $request->image;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $image = Image::make($icon)->encode('webp', 80)->save(public_path('../../public_html/uploads/app_gallery/'  .  $icon_new_name . '.webp'));
            $nameimg ='uploads/app_gallery/'  .  $icon_new_name . '.webp';


            $records->image =$nameimg;


            $records->save();
        }

        flash()->success('Edit Success');
        return redirect(route('app_gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        if( AppGallery::find($id) != null){
             AppGallery::find($id)->delete();
        }
       
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
