<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Photo;

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
            'event'=>$request->get('event'),
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

        $filename = $this->prepareFile($request);

        if ($filename === false) {
            \Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
        } else {

            $data = $request->all();
            $data['file'] = $filename;
            $data['user_id'] = Auth()->user()->id;
            Photo::create($data);

            \Session::flash('message', 'Nouvelle photo ajoutée avec succès.');
        }

        return redirect()->route('user.photo.index');
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo=Photo::where('user_id', '=', Auth()->user()->id)->with([])->findOrFail($id);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Photo::where('user_id', '=', Auth()->user()->id)->findOrFail($id);

        // Delete the thumbnail, picture and original
        \Illuminate\Support\Facades\Storage::delete(UPLOADS_PIC_FOLDER.$photo->file);
        \Illuminate\Support\Facades\Storage::delete(ORIGINAL_PICS_FOLDER.$photo->file);
        \Illuminate\Support\Facades\Storage::delete(UPLOADS_THUMB_FOLDER.$photo->file);
        $photo->delete();

        \Session::flash('message', 'Photo supprimée avec succès.');

        return redirect()->route('user.photo.index');
    }

    /**
     * Saves the image(s)
     *
     * @param type $request
     *
     * @return mixed false on fail, new file name on success.
     */
    protected function prepareFile($request)
    {
        $upImage = $request->file('file');
        // File name
        $filename = time() . '.' . $upImage->getClientOriginalExtension();

        // Image manipulation
        $image = new \App\Libraries\SimpleImage();
        $image->load($upImage->getPathname());

        // Try to save the original image
        if (!$image->save(ORIGINAL_PICS_FOLDER . $filename)) {
            return false;
        }

        // Create a thumb
        $image->resizeToWidth(200);
        if (!$image->save(UPLOADS_THUMB_FOLDER . $filename)) {
            return false;
        }

        $image->reset();
        // Create a watermarked image
        $image->resizeToWidth(960);
        $image->watermark(WATERMARKS_FOLDER . 'default.gif');
        if (!$image->save(UPLOADS_PIC_FOLDER . $filename)) {
            return false;
        }

        return $filename;
    }
}
