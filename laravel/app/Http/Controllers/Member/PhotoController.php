<?php
namespace App\Http\Controllers\Member;

use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PhotoController extends \App\Http\Controllers\Member\MemberController
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $disciplines = \App\Discipline::query()
            ->select('id', 'name')
            ->with('events')
            ->get()
            ->toArray();
        $watermarks = \App\Watermark::query()->pluck('name', 'id');
        $licenses = \App\License::query()->pluck('name', 'id');
        return view('member/photos/create', [
            'pageTitle' => 'Nouvelle photo',
            'disciplines' => $disciplines,
            'watermarks' => $watermarks,
            'licenses' => $licenses,
            'event' => $request->get('event'),
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
            'file' => 'required|mimes:jpeg,png,gif',
        ]);

        $watermark = \App\Watermark::findOrFail($request->get('watermark_id'));
        $filename = $this->prepareFile($request, $watermark);

        if ($filename === false) {
            Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
        } else {
            $data = $request->all();
            $data['file'] = $filename;
            $data['user_id'] = Auth()->user()->id;
            $request->file('file')->move(public_path(ORIGINAL_PICS_FOLDER), $data['file']);

            Photo::create($data);

            Session::flash('message', 'Nouvelle photo ajoutée avec succès.');
        }

        return redirect()->route('user.event.show', $data['event_id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::where('user_id', '=', Auth()->user()->id)->with([])->findOrFail($id);

        $disciplines = \App\Discipline::query()
            ->select('id', 'name')
            ->with('events')
            ->get()
            ->toArray();
        $watermarks = \App\Watermark::query()->pluck('name', 'id');
        $licenses = \App\License::query()->pluck('name', 'id');
        return view('member/photos/edit', [
            'pageTitle' => 'Edition d\'une photo',
            'disciplines' => $disciplines,
            'watermarks' => $watermarks,
            'licenses' => $licenses,
            'photo' => $photo,
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

        $photo = Photo::where('user_id', '=', Auth()->user()->id)->findOrFail($id);

        $doSave = true;
        $filename = null;
        $data = $request->all();
        if ($request->get('watermark_id') != $photo->watermark_id) {
            // Fetch new watermark in DB
            $watermark = \App\Watermark::findOrFail($request->get('watermark_id'));
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

        return redirect()->route('user.event.show', $photo->event_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::where('user_id', '=', Auth()->user()->id)->findOrFail($id);

        \Illuminate\Support\Facades\File::delete(public_path(UPLOADS_PIC_FOLDER . $photo->file));
        \Illuminate\Support\Facades\File::delete(public_path(ORIGINAL_PICS_FOLDER . $photo->file));
        \Illuminate\Support\Facades\File::delete(public_path(UPLOADS_THUMB_FOLDER . $photo->file));

        $photo->delete();
        Session::flash('message', 'Photo supprimée avec succès.');

        return redirect()->route('user.event.show', $photo->event_id);
    }

    /**
     * Saves the image(s)
     *
     * @param type $request
     *
     * @return mixed false on fail, new file name on success.
     */
    protected function prepareFile(Request $request, $watermark, $original = null)
    {
//        dd([$request->all(), $watermark->toArray, $original]);
        // Load the lib
        $image = new \App\Libraries\SimpleImage();

        // Define file name: original name or new one.
        $filename = ($original === null ? time() . '.' . $request->file('file')->getClientOriginalExtension() : $original);
        // Define original file: already existing or from form.
        $original = ($original === null ? $request->file('file')->getPathName() : ORIGINAL_PICS_FOLDER . $original);
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
