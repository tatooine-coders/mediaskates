<?php

namespace App\Http\Controllers\Admin;


use App\Discipline;
use App\Event;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class EventController extends \App\Http\Controllers\Admin\AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::query()->get();
        return view('events/index',[
            'pageTitle' => 'Liste des Evenements',
            'events' => $events
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplines=Discipline::query()->get();

        return view('events/create', [
            'pageTitle' => 'Evenements',
            'disciplines' => $disciplines
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
        // Data validation (https://laravel.com/docs/5.3/validation)
        $this->validate($request, [
            'name' => 'required',
            'adresse' => 'required',
            'city' => 'required',
            'date_event' => 'required',

        ]);

        $data = $request->all();
        $data{'user_id'}=auth()->user()->id;


        Event::create($data);

        // Redirection et message
        \Session::flash('message', 'Nouvelle evenement cré');
        return redirect()->route('admin.event.index');


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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
