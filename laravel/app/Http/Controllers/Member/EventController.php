<?php
namespace App\Http\Controllers\Member;

use App\Discipline;
use App\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EventController extends \App\Http\Controllers\Member\MemberController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::withCount(['photos' => function ($query) {
            $query->where('user_id', '=', Auth()->user()->id);
        }])->get();

        return view('member/events/index', [
            'pageTitle' => 'Evènements',
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
        $disciplines = \App\Discipline::query()->pluck('name', 'id');

        return view('member/events/create', [
            'pageTitle' => 'Nouvel évènement',
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
            'name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'date_event' => 'required|date',
            'discipline_id' => 'required',
        ]);

        $data = $request->all();
        // Adding current user
        $data['user_id'] = Auth()->user()->id;

        Event::create($data);

        // Redirection et message
        Session::flash('message', 'Nouvel évènement créé');
        return redirect()->route('user.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with(['photos' => function ($query) {
            $query->where('user_id', '=', Auth()->user()->id);
        }])->findOrFail($id);

        return view('member/events/show', [
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
        $event = Event::where('user_id', '=', Auth()->user()->id)
            ->findOrFail($id);
        $disciplines = Discipline::query()->pluck('name', 'id');

        return view('member/events/edit', [
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

        $event->update($request->all());

        // Redirection et message
        Session::flash('message', 'Evènement mis à jour.');

        return redirect()->route('user.event.index');
    }
}
