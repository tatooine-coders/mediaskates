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
            'logo' => 'required|string',
        ]);

        $data = $request->all();
        Discipline::create($data);

        \Session::flash('message', 'Nouvelle discipline créée avec succès.');

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
            'logo' => 'required|string',
        ]);

        $discipline = Discipline::findOrFail($id);
        $discipline->name = Input::get('name');
        $discipline->logo = Input::get('logo');
        $discipline->save();

        \Session::flash('message', 'Discipline mise à jour.');

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
}
