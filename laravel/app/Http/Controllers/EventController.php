<?php
namespace App\Http\Controllers;

use App\Event;
use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::query()->get();
        return view('events/index', [
            'pageTitle' => 'Liste des évènements',
            'events' => $events
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $photos = Photo::query()->where('event_id', $id)->paginate(1);

        return view('events/show', [
            'pageTitle' => $event->name,
            'event' => $event,
            'photos' => $photos,
        ]);
    }
}
