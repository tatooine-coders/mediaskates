<?php
namespace App\Http\Controllers\Admin;

use App\License;
use App\Photo;
use App\Discipline;
use App\Event;
use App\Watermark;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PhotoController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $photos = Photo::query()->get();
//
//        return view('admin/photos/index', [
//            'pageTitle' => 'Liste des Photos',
//            'photos' => $photos
//        ]);
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        $events = Event::query()->pluck('name', 'id');
//        $watermarks = Watermark::query()->pluck('name', 'id');
//        $licenses = License::query()->pluck('name', 'id');
//
//        return view('admin/photos/create', [
//            'pageTitle' => 'Ajouter une photo',
//            'events' => $events,
//            'watermarks' => $watermarks,
//            'licenses' => $licenses
//        ]);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        $this->validate($request, [
//            'file' => 'mimes:png,jpeg,gif',
//            'event_id' => 'required',
//            'watermark_id' => 'required',
//            'license_id' => 'required',
//        ]);
//
//        $data=$request->all();
//        $data['user_id'] = Auth()->user()->id;
//        Photo::create($data);
//
//        // Redirection et message
//        \Session::flash('message', 'Nouvelle photo enregistrée');
//        return redirect()->route('admin.photo.index');
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        return view('admin/photos/show', [
            'pageTitle' => 'Photo',
            'photo' => $photo,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::query()->pluck('name', 'id');
        $watermarks = Watermark::query()->pluck('name', 'id');
        $licenses = License::query()->pluck('name', 'id');

        $photo = Photo::findOrFail($id);

        return view('admin/photos/edit', [
            'pageTitle' => 'Photo',
            'events' => $events,
            'photo' => $photo,
            'watermarks' => $watermarks,
            'licenses' => $licenses

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'required',
            'event_id' => 'required',
            'watermark_id' => 'required',
            'license_id' => 'required',
        ]);

        $photo = Photo::findOrFail($id);
        $photo->file = Input::get('file');
        $photo->license_id = Input::get('license_id');
        $photo->watermark_id = Input::get('watermark_id');
        $photo->event_id = Input::get('event_id');
        $photo->user_id = auth()->user()->id;

        $photo->save();

        // Redirection et message
        \Session::flash('message', 'Photo mise à jour');
        return redirect()->route('admin.photo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->delete();
        \Session::flash('message', 'Photo successfully delete.');

        return redirect()->route('admin.event.show', $photo->event_id);
    }
}
