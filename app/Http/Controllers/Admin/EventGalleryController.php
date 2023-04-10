<?php

namespace App\Http\Controllers\Admin;

use App\models\Event;
use App\models\EventGallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Routing\Redirector;

use Intervention\Image\Facades\Image as Image;

class EventGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IncludeDatatable $client
     * @return void
     */
    public function index()
    {
        $records = Event::paginate(20);
        return view('admin.event_gallery.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.event_gallery.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);
        $record = Event::create([
        'title' => $request['title'],
        'description' => $request['description'],
    ]);
    if(!empty($record)){
        if(isset($request['images']) && count($request['images']) > 0){
            foreach($request['images'] as $image){
                EventGallery::create([
                    'event_id' => $record->id,
                    'file' => $image,
                    'type' => 'image',
                ]);
            }
        }
        if(isset($request['videos']) && count($request['videos']) > 0){
            foreach($request['videos'] as $video){
                EventGallery::create([
                    'event_id' => $record->id,
                    'file' => $video,
                    'type' => 'video',
                ]);
            }
        }
    }
       
        flash()->success('Create Success');
        return redirect(route('events.index'));
    }
    public function addImage(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image',
        ]);
      
        if ( $request->hasFile('file')  ) {
            $icon = $request->file;
            $icon_new_name = time() . $icon->getClientOriginalName();
            $image = Image::make($icon)->encode('webp', 80)->save(public_path('uploads/event_gallery/'  .  $icon_new_name . '.webp'));
            $nameimg ='uploads/event_gallery/'  .  $icon_new_name . '.webp';
          return response()->json(
    		['status'=>"success",'file_name'=>$nameimg,
    	]);
        }
        return response()->json(
    		['status'=>"false",'file_name'=>null,
    	]);
    }
    public function addVideo(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        if ( $request->hasFile('file')  ) {
            $video = $request->file;            
            $videoname = time().'.'.$video->getClientOriginalExtension();
            $destinationPath = 'uploads/event_gallery';
            $video->move($destinationPath, $videoname);
            return response()->json(
                ['status'=>"success",'file_name'=>'uploads/event_gallery/'.$videoname,
            ]);
        }
        return response()->json(
    		['status'=>"false",'file_name'=>null,
    	]);
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
        $model = Event::findOrFail($id);
        $files = EventGallery::where('event_id',$id)->get();
        return view('admin.event_gallery.edit', compact('model','files'));
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
        $records = Event::findOrFail($id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        $records->update($request->only('title','description'));

        EventGallery::where('event_id',$id)->delete();

           if(isset($request['images']) && count($request['images']) > 0){
            foreach($request['images'] as $image){
                EventGallery::create([
                    'event_id' => $id,
                    'file' => $image,
                    'type' => 'image',
                ]);
            }
        }
        if(isset($request['videos']) && count($request['videos']) > 0){
            foreach($request['videos'] as $video){
                EventGallery::create([
                    'event_id' => $id,
                    'file' => $video,
                    'type' => 'video',
                ]);
            }
        }

        flash()->success('Edit Success');
        return redirect(route('events.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        if( Event::find($id) != null){
             Event::find($id)->delete();
             EventGallery::where('event_id',$id)->delete();
        }
        flash()->success('Success Deleted');
        return redirect()->back();
    }
}
