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
            'file' => 'mimes:png,jpg,gif',
            'event_id' => 'required',
            'watermark_id' => 'required',
            'license_id' => 'required',
        ]);

        $error = 0;
        $photo = Photo::findOrFail($id);
        if ($request->get('watermark_id') != $photo->watermark_id) {
            switch ($request->get('watermark_id')) {
                case 2:
                    $config = ['position' => 'center', 'opacity' => 0.5];
                    $file = 'center.png';
                    break;
                default:
                    $config = ['position' => 'bottom-right', 'opacity' => 0.5];
                    $file = 'default.gif';
            }

            // Delete the thumbnail, picture and original
            \Illuminate\Support\Facades\Storage::delete(UPLOADS_PIC_FOLDER . $photo->file);
            \Illuminate\Support\Facades\Storage::delete(UPLOADS_THUMB_FOLDER . $photo->file);

            $image = new \App\Libraries\SimpleImage();
            $image->load(ORIGINAL_PICS_FOLDER . $photo->file);
            $image->resizeToWidth(THUMB_WIDTH);
            if (!$image->save(UPLOADS_THUMB_FOLDER . $photo->file)) {
                $error = 1;
            }
            $image->load(ORIGINAL_PICS_FOLDER . $photo->file);
            $image->resizeToWidth(PIC_WIDTH);
            $image->waterMark('images/watermarks/' . $file, $config['position']);
            if (!$image->save(UPLOADS_PIC_FOLDER . $photo->file)) {
                $error = 1;
            }
        }
        if ($error === 0) {
            $photo->update($request->all());
            Session::flash('message', 'Photo mise à jour');
        } else {
            Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
        }

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
