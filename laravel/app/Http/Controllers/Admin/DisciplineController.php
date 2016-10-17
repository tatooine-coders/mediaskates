<?php
namespace App\Http\Controllers\Admin;

use App\Discipline;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * @todo See alternatives and take a decision about destroy behaviour.
 */
class DisciplineController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::query()->get();

        return view('admin/disciplines/index', [
            'pageTitle' => 'Liste des disciplines',
            'disciplines' => $disciplines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/disciplines/create', [
            'pageTitle' => 'Nouvelle discipline',
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
            'name' => 'required|string',
            'logo' => 'required|mimes:jpeg,png,gif',
        ]);

        $filename = $this->prepareFile($request);

        if (filename === false) {
            \Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
        } else {

            $data = $request->all();
            $data->logo = $filename;
            Discipline::create($data);

            \Session::flash('message', 'Nouvelle discipline créée avec succès.');
        }

        return redirect()->route('admin.discipline.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discipline = Discipline::findOrFail($id);

        return view('admin/disciplines/show', [
            'discipline' => $discipline,
            'pageTitle' => $discipline->name
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
        $discipline = Discipline::findOrFail($id);

        return view('admin/disciplines/edit', [
            'pageTitle' => 'Edition d\'une discipline',
            'discipline' => $discipline
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
            'name' => 'required|string',
        ]);

        $discipline = Discipline::findOrFail($id);

        $filename = null;
        $doSave = true;
        if (!empty($request->file('logo'))) {
            $filename = $this->prepareFile($request);
        }
        $data = $request->all();
        switch ($filename) {
            case null: // No new pic
                unset($data['logo']);
                die('Nothing');
                break;
            case false: // Error
                $doSave = false;
                \Session::flash('error', 'Une erreur est survenue lors du traitement de votre image.');
                break;
            default: // New pic
                $data['logo'] = $filename;
        }
        if ($doSave) {
            $discipline->update($data);
            \Session::flash('message', 'Discipline mise à jour.');
        }

        return redirect()->route('admin.discipline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discipline = Discipline::findOrFail($id);
        $discipline->delete();

        Session::flash('message', 'Discipline supprimée.');

        return redirect()->route('admin.discipline.index');
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
        // Try to create the thumb and save it
        $upImage = $request->file('logo');
        // File name
        $filename = time() . '.' . $upImage->getClientOriginalExtension();
        // Image manipulation
        $image = new \App\Libraries\SimpleImage();
        $image->load($upImage->getPathname());

        /*
         *  Image for cover
         */

        // Resize/crop
        $image->centerCropFull(960, 540);

        // Save
        if (!$image->save(DISCIPLINES_PIC_FOLDER . $filename)) {
            return false;
        }

        /*
         * Thumb for admin
         */
        $image->resizeToWidth(150);
        if (!$image->save(DISCIPLINES_PIC_FOLDER . 'thumbs/' . $filename)) {
            return false;
        }

        return $filename;
    }
}
