<?php
namespace App\Http\Controllers\Admin;

use App\Discipline;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = 'name';
        $direction = 'asc';

        if ($request->has('order') && in_array(
            $request->get('order'),
            ['name', 'city', 'address', 'zip', 'date_event', 'created_at', 'updated_at']
        )) {
            $order = $request->get('order');
        }

        if ($request->has('direction') && in_array(
            $request->get('direction'),
            ['asc', 'desc']
        )) {
            $request->get('direction');
        }

        $events = Event::query()
            ->orderBy($order, $direction)
            ->withCount('photos')
            ->get();

        return view('admin/events/index', [
            'pageTitle' => 'Liste des évènements',
            'events' => $events,
            'direction' => $direction,
            'order' => $order,
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
            'discipline_id' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Event::create($data);

        Session::flash('message', 'Nouvel évènement créé avec succès.');

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
            'pageTitle' => 'Evènements',
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

        $event->update($request->all());

        // Redirection et message
        Session::flash('message', 'Evènement mis à jour.');

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
