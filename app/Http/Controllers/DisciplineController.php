<?php
namespace App\Http\Controllers;

use App\Discipline;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::query()->get();

        return view('disciplines/index', [
            'pageTitle' => 'Disciplines',
            'disciplines' => $disciplines,
        ]);
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

        return view('disciplines/show', [
            'discipline' => $discipline,
            'pageTitle' => $discipline->name
        ]);
    }
}
