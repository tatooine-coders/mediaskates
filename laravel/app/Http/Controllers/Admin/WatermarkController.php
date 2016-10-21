<?php
namespace App\Http\Controllers\Admin;

use App\Watermark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Libraries\SimpleImage;

class WatermarkController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Filters
        $order = 'name';
        $direction = 'asc';

        if ($request->has('order') &&
            in_array(
                $request->get('order'), ['name', 'margin', 'position', 'file', 'created_at', 'updated_at']
            )) {
            $order = $request->get('order');
        }

        if ($request->has('direction') &&
            in_array(
                $request->get('direction'), ['asc', 'desc']
            )) {
            $direction = $request->get('direction');
        }
        $watermarks = Watermark::query()
            ->orderBy($order, $direction)
            ->get();

        return view('admin/watermarks/index', [
            'pageTitle' => 'Liste des watermarks',
            'watermarks' => $watermarks,
            'order' => $order,
            'direction' => $direction,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/watermarks/create', [
            'pageTitle' => 'Ajouter un watermark',
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
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
            'file' => 'mimes:gif,png,jpg'
        ]);

        $filename = $this->prepareFile($request);

        if ($filename === false) {
            Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
        } else {
            $data = $request->all();
            $data['file'] = $filename;
            Watermark::create($data);

            Session::flash('message', 'Nouveau watermark créé avec succès.');
        }

        // Redirection
        return redirect()->route('admin.watermark.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $watermark = Watermark::findOrFail($id);
        return view('admin/watermarks/show')->withWatermark($watermark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $watermark = Watermark::findOrFail($id);
        return view('admin/watermarks/edit')->withWatermark($watermark);
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
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
            'file' => 'mimes:gif,png,jpg'
        ]);

        $watermark = Watermark::findOrFail($id);
        $filename = null;
        $doSave = true;
        if (!empty($request->file('file'))) {
            $filename = $this->prepareFile($request);
        }
        $data = $request->all();
        switch ($filename) {
            case null: // No new pic
                unset($data['file']);
                break;
            case false: // Error
                $doSave = false;
                Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
                break;
            default: // New pic
                $data['file'] = $filename;
        }
        if ($doSave) {
            // Save
            $watermark->update($data);
            Session::flash('message', 'Watermark mis à jour.');
        }

        return redirect()->route('admin.watermark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watermark = Watermark::findOrFail($id);
        \Illuminate\Support\Facades\Storage::delete(WATERMARKS_FOLDER . $watermark->file);
        $watermark->delete();
        Session::flash('message', 'Watermark successfully delete.');

        return redirect()->route('admin.watermark.index');
    }

    protected function prepareFile(Request $request, $original = null)
    {
        // Define file name: original name or new one.
        $filename = ($original === null ? time() . '.' . $request->file('file')->getClientOriginalExtension() : $original);
        // Define original file: already existing or from form.
        $original = ($original === null ? $request->file('file')->getPath() : WATERMARKS_FOLDER . $original);

        $upImage = $request->file('file');
        $upImage->move(public_path(WATERMARKS_FOLDER), $filename);

        if (!file_exists(public_path(WATERMARKS_FOLDER . $filename))) {
            return false;
        }

        return $filename;
    }
}
