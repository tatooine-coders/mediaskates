<?php
namespace App\Http\Controllers\Admin;

use App\Discipline;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

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
        return view('admin/events/index', [
            'pageTitle' => 'Liste des évènements',
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
        $disciplines = Discipline::query()->pluck('name', 'id');

        return view('admin/events/create', [
            'pageTitle' => 'Nouvel évènement',
            'disciplines' => $disciplines,
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
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'date_event' => 'required|date',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Event::create($data);

        \Session::flash('message', 'Nouvel évènement créé avec succès.');

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
        $event = Event::findOrFail($id);

        return view('admin/events/show', [
            'pageTitle' => $event->name,
            'event' => $event,
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
        $disciplines = Discipline::query()->pluck('name', 'id');

        $event = Event::findOrFail($id);

        return view('admin/events/edit', [
            'pageTitle' => 'Evenements',
            'disciplines' => $disciplines,
            'event' => $event,
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
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'date_event' => 'required',
        ]);
        $event = Event::findOrFail($id);
        $event->name = Input::get('name');
        $event->address = Input::get('address');
        $event->city = Input::get('city');
        $event->zip = Input::get('zip');
        $event->date_event = Input::get('date_event');
        $event->discipline_id = Input::get('discipline_id');
        $event->user_id = auth()->user()->id;
        $event->save();

        // Redirection et message
        \Session::flash('message', 'Evènement mis à jour.');

        return redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        Session::flash('flash_message_delete', 'Evènement supprimé.');

        return redirect()->route('admin.event.index');
    }
}
