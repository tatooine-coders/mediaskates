<?php
namespace App\Http\Controllers;

use App\Discipline;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advancedSearch()
    {
//        $events = Event::query()->pluck('name', 'id');
//        $disciplines = Discipline::query()->pluck('name', 'id');
//        $users = User::query()->pluck('pseudo', 'id');

        return view('search/advancedSearch', [
            'pageTitle' => 'Recherche avancée',
//            'events' => $events,
//            'disciplines' => $disciplines,
//            'users' => $users,

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchResults(Request $request)
    {

        switch ($request->choice){

            //recherche dans discipline
            case '1':
                $results = Discipline::query()->where('name', 'like', '%'.$request->name.'%')->get();
                $url = 'discipline';
                break;

            //recherche dans event
            case '2' :
                $results = Event::query()->where('name', 'like', '%'.$request->name.'%')->get();
                $url = 'event';
                break;

            //recherche dans user->pseudo
            case '3' :
                $results = User::query()->where('pseudo', 'like', '%'.$request->name.'%')->orWhere('last_name', 'like', '%'.$request->name.'%')->orWhere('first_name', 'like', '%'.$request->name.'%')->get();
                $url = 'user';
                break;
        }


        //
        //preparation de la vue à renvoyer
        //

//        $events = Event::query()->pluck('name', 'id');
//        $disciplines = Discipline::query()->pluck('name', 'id');
//        $users = User::query()->pluck('pseudo', 'id');

        return view('search/advancedSearch', [
            'pageTitle' => 'Recherche avancée',
            'results' => $results,
            'url' => $url,

//            'events' => $events,
//            'disciplines' => $disciplines,
//            'users' => $users,
        ]);
    }
}
