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
            'file' => ALLOWED_MIMES,
            'event_id' => 'required',
            'watermark_id' => 'required',
            'license_id' => 'required',
        ]);

        $photo = Photo::findOrFail($id);

        $doSave = true;
        $filename = null;
        $data = $request->all();
        if ($request->get('watermark_id') != $photo->watermark_id) {
            // Fetch new watermark in DB
            $watermark = Watermark::findOrFail($request->get('watermark_id'));
            // Re-create the thumbnail
            $filename = $this->prepareFile($request, $watermark, $photo->file);
        }

        if ($filename === false) {
            Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
            $doSave = false;
        }

        if ($doSave) {
            $photo->update($data);
            Session::flash('message', 'Photo mise à jour');
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

        \Illuminate\Support\Facades\File::delete(public_path(UPLOADS_PIC_FOLDER.$photo->file));
        \Illuminate\Support\Facades\File::delete(public_path(ORIGINAL_PICS_FOLDER.$photo->file));
        \Illuminate\Support\Facades\File::delete(public_path(UPLOADS_THUMB_FOLDER.$photo->file));

        $photo->delete();
        Session::flash('message', 'Photo supprimée avec succès.');

        return redirect()->route('admin.event.show', $photo->event_id);
    }

    protected function prepareFile(Request $request, $watermark, $original = null)
    {
        // Load the lib
        $image = new \App\Libraries\SimpleImage();

        // Define file name: original name or new one.
        $filename = ($original === null ? time() . '.' . $request->file('file')->getClientOriginalExtension() : $original);
        // Define original file: already existing or from form.
        $original = ($original === null ? $request->file('file')->getPath() : ORIGINAL_PICS_FOLDER . $original);
        // Loading the file
        $image->load($original);

        $error = 0;

        // Creating thumbnail
        $image->resizeToWidth(THUMB_WIDTH);
        if (!$image->save(UPLOADS_THUMB_FOLDER . $filename)) {
            $error = 1;
        }

        // Reload and create the watermarked image
        $image->load($original);
        $image->resizeToWidth(PIC_WIDTH);
        $image->waterMark('images/watermarks/' . $watermark->file, $watermark->position, $watermark->margin);
        if (!$image->save(UPLOADS_PIC_FOLDER . $filename)) {
            $error = 1;
        }
        if ($error == 1) {
            return false;
        } else {
            return $filename;
        }
    }
}
