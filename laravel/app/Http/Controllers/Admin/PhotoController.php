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
    public function index()
    {
        $photos = Photo::query()->get();
        return view('photos/index',[
            'pageTitle' => 'Liste des Photos',
            'photos' => $photos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events=Event::query()->pluck('name', 'id');
        $watermarks=Watermark::query()->pluck('name', 'id');
        $licenses=License::query()->pluck('name', 'id');

        return view('photos/create', [
            'pageTitle' => 'Photos',
            'events' => $events,
            'watermarks'=> $watermarks,
            'licenses' => $licenses
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'event_id' => 'required',
            'watermark_id' => 'required',
            'license_id' => 'required',

        ]);

        $photo = new Photo;
        $photo->file       = Input::get('file');
        $photo->event_id = Input::get('event_id');
        $photo->watermark_id = Input::get('watermark_id');
        $photo->license_id = Input::get('license_id');
        $photo->user_id = auth()->user()->id;
        $photo->save();


        // Redirection et message
        \Session::flash('message', 'Nouvelle photo enregistrée');
        return redirect()->route('admin.photo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'date_event' => 'required',
            'discipline_id' => 'required',

        ]);

        $photo = new Photo;
        $photo->file       = Input::get('name');
        $photo->address      = Input::get('address');
        $photo->city = Input::get('city');
        $photo->zip = Input::get('zip');
        $photo->date_event = Input::get('date_event');
        $photo->discipline_id = Input::get('discipline_id');
        $photo->user_id = auth()->user()->id;
        $photo->save();


        // Redirection et message
        \Session::flash('message', 'Nouvelle evenement cré');
        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Event::findOrFail($id);
        $photo->delete();
        /** Session::flash('flash_message_delete','Discipline successfully delete.'); */
        return redirect()->route('admin.photo.index');
    }
}
