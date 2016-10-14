<?php
namespace App\Http\Controllers\Admin;

use App\Watermark;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class WatermarkController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watermarks = Watermark::query()->get();
        return view('admin/watermarks/index', [
            'pageTitle' => 'Liste des watermarks',
            'watermarks' => $watermarks
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
            'type' => 'required|numeric',
            'description' => 'required',
        ]);


        $watermark = new Watermark;
        $watermark->name = Input::get('name');
        $watermark->type = Input::get('type');
        $watermark->description = Input::get('description');
        $watermark->save();

        // Redirection et message
        \Session::flash('message', 'Nouveau watermark crée');
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
            'type' => 'required|numeric',
            'description' => 'required'
        ]);

        $watermark = Watermark::find($id);
        $watermark->name = Input::get('name');
        $watermark->type = Input::get('type');
        $watermark->description = Input::get('description');
        $watermark->save();

        // Redirection et message
        \Session::flash('message', 'Watermark mis à jour!');
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
        $watermark->delete();
        /** Session::flash('flash_message_delete','Watermark successfully delete.'); */
        return redirect()->route('admin.watermark.index');
    }
}
