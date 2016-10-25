<?php
namespace App\Http\Controllers\Member;

use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

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

        // Creates a random form session number
        $formSession = md5(microtime());
        Session::push('uploads.' . $formSession, time());
        // Create temp folders
        File::makeDirectory(public_path(UPLOAD_TEMP_FOLDER . $formSession));
        File::makeDirectory(public_path(UPLOAD_TEMP_FOLDER . $formSession . '/big'));

        return view('member/photos/create', [
            'pageTitle' => 'Nouvelle photo',
            'disciplines' => $disciplines,
            'watermarks' => $watermarks,
            'licenses' => $licenses,
            'event' => $request->get('event'),
            'formSession' => $formSession,
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
        // Base rules
        $rules = [
            'event_id' => 'required|exists:events,id',
            'watermark_id' => 'required|exists:watermarks,id',
            'license_id' => 'required|exists:licenses,id',
            'formSession' => 'required',
        ];
        $sessionName = $request->get('formSession');
        // Checking for multiupload:
        if (count(File::files(UPLOAD_TEMP_FOLDER . $sessionName . '/big/')) > 0) {
            $errors = $this->_saveMultiupload($request);
        } else { // No multi upload
            // Adding at least one picture so validator fails if none is uploaded
            $rules['files.0'] = 'required|' . ALLOWED_MIMES;
            // Adding potential other ones
            for ($i = 1; $i < count($request->files->get('files')); $i++) {
                $rules['files.' . $i] = 'required|' . ALLOWED_MIMES;
            }
            $this->validate($request, $rules);
            // Generate and save
            $errors = $this->_saveFileInputs($request);
        }

        if ($errors > 0) {
            Session::flash('error', 'Une erreur est survenue lors du traitement de certaines images.');
        } else {
            Session::flash('message', 'Nouvelle photo ajoutée avec succès.');
        }

        return redirect()->route('user.event.show', $request->get('event_id'));
    }

    protected function _saveMultiupload(Request $request)
    {
        $errors = 0;
        $imageData = $request->all();
        unset($imageData['files']);
        unset($imageData['formSession']);
        $imageData['user_id'] = Auth()->user()->id;

        // Determine folder
        $sessionName = $request->get('formSession');
        $thumbPath = UPLOAD_TEMP_FOLDER . $sessionName;
        $basePath = UPLOAD_TEMP_FOLDER . $sessionName . '/big';
        $files = File::files($basePath);

        // Searching for watermark
        $watermark = \App\Watermark::findOrFail($request->get('watermark_id'));

        foreach ($files as $file) {
            // Get the filename
            $filename = $this->_prepareFile(public_path($file), $watermark, basename($file));
            if (!is_null($filename)) {
                if (!File::move(public_path($file), public_path(UPLOADS_PIC_FOLDER . $filename))) {
                    $errors++;
                } else {
                    $imageData['file'] = $filename;
                    Photo::create($imageData);
                    // Delete original pic
                    File::delete(public_path($thumbPath . '/' . $filename));
                    File::delete(public_path($basePath . '/' . $filename));
                }
            } else {
                $errors++;
            }
        }
        // Delete temp folders
        File::deleteDirectory(public_path($basePath));
        File::deleteDirectory(public_path($thumbPath));
        return $errors;
    }

    /**
     * Creates a random filename
     *
     * @param string $ext
     *
     * @return string
     */
    protected function _createFileName($ext = null)
    {
        $basename = md5(microtime());
        if (!is_null($ext)) {
            $basename .= '.' . $ext;
        }
        return $basename;
    }

    /**
     * Saves a list of files submitted in inputs.
     *
     * @param Request $request Original page request
     *
     * @return int Number of errors encountered
     */
    protected function _saveFileInputs(Request $request)
    {
        $errors = 0;
        $imageData = $request->all();
        unset($imageData['files']);
        unset($imageData['formSession']);
        $imageData['user_id'] = Auth()->user()->id;

        // Searching for watermark
        $watermark = \App\Watermark::findOrFail($request->get('watermark_id'));

        // Processing the list
        $files = $request->file('files');
        foreach ($files as $k => $file) {
            $wantedFileName = $this->_createFileName($file->getClientOriginalExtension());
            $filename = $this->_prepareFile($file->getPathName(), $watermark, $wantedFileName);
            if ($filename === false) {
                $errors++;
            } else {
                $imageData['file'] = $filename;
                $file->move(public_path(ORIGINAL_PICS_FOLDER), $imageData['file']);
                Photo::create($imageData);
            }
        }
        return $errors;
    }

    public function ajaxUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|' . ALLOWED_MIMES,
            'formSession' => 'required',
        ]);

        $sessionName = $request->get('formSession');

        $formSession = Session::get('uploads.' . $sessionName);
        if (empty($formSession)) {
            return ['error' => 'Invalid form session'];
        }

        // Create a thumb
        $image = new \App\Libraries\SimpleImage();

        // Define file name: original name or new one.
        $filename = $this->_createFileName($request->file('file')->getClientOriginalExtension());
        // Define original file
        $basePath = public_path(UPLOAD_TEMP_FOLDER . $sessionName . '/big/');
        $request->file('file')->move($basePath, $filename);

        // Loading the file
        $image->load($basePath . $filename);

        // Create thumbnail
        $image->centerCropFull(THUMB_WIDTH, THUMB_WIDTH);
        if (!$image->save(UPLOAD_TEMP_FOLDER . $sessionName . '/' . $filename)) {
            return ['error' => 'An error occured'];
        } else {
            return [
                'error' => false,
                'filename' => $filename,
            ];
        }
    }

    public function ajaxCancel(Request $request)
    {
        $this->validate($request, [
            'imageName' => 'required',
            'formSession' => 'required',
        ]);
        $d = $request->all();

        $thumbPath = UPLOAD_TEMP_FOLDER . $d['formSession'];
        $basePath = UPLOAD_TEMP_FOLDER . $d['formSession'] . '/big';

        File::delete(public_path($thumbPath . '/' . $d['imageName']));
        File::delete(public_path($basePath . '/' . $d['imageName']));

        return['message'=>'OK'];
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
            'file' => ALLOWED_MIMES,
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
            $filename = $this->_prepareFile($request, $watermark, $photo->file);
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

        File::delete(public_path(UPLOADS_PIC_FOLDER . $photo->file));
        File::delete(public_path(ORIGINAL_PICS_FOLDER . $photo->file));
        File::delete(public_path(UPLOADS_THUMB_FOLDER . $photo->file));

        $photo->delete();
        Session::flash('message', 'Photo supprimée avec succès.');

        return redirect()->route('user.event.show', $photo->event_id);
    }

    /**
     * Saves the image(s)
     *
     * @param string $original Original file path
     * @param Watermark $watermark Watermark entry
     * @param string $filename Desired file name
     *
     * @return string|bool False on fail, new file name on success.
     */
    protected function _prepareFile($original, $watermark, $filename)
    {
        // Load the lib
        $image = new \App\Libraries\SimpleImage();

        // Define file name: original name or new one.
//        $filename = ($original === null ? $this->_createFileName($file->getClientOriginalExtension()) : $original);
//        // Define original file: already existing or from form.
//        $original = ($original === null ? $file->getPathName() : $original));
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
