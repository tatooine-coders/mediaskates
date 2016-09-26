<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discipline;
use App\Http\Requests;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines=Discipline::query()->get();

        return view('disciplines/index', [
            'pageTitle'=>'Disciplines',
            'disciplines'=>$disciplines,
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
        //
    }
}
