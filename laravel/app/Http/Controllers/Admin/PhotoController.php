<?php
namespace App\Http\Controllers\Admin;

use App\License;
use App\Photo;
use App\Event;
use App\Watermark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhotoController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::where('user_id', '=', Auth()->user()->id)->findOrFail($id);

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
        $photo->update($request->all());

        // Redirection et message
        Session::flash('message', 'Photo mise à jour');
        return redirect()->route('admin.event.show', $photo->event_id);
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
        Session::flash('message', 'Photo supprimée avec succès.');

        return redirect()->route('admin.event.show', $photo->event_id);
    }
}
