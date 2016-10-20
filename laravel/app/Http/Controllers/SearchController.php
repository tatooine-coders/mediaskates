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
    public function advanced_Search()
    {
        $events = Event::query()->pluck('name', 'id');
        $disciplines = Discipline::query()->pluck('name', 'id');
        $users = User::query()->pluck('pseudo', 'id');

        return view('search/advancedSearch', [
            'pageTitle' => 'Recherche avancée',
            'events' => $events,
            'disciplines' => $disciplines,
            'users' => $users,

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_Results(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'choice' => 'required|int',
        ]);



        //recherche dans discipline
        if($request->choice==='1'){

            $results = Discipline::query()->where('name', $request->name)->pluck('name');
        }
        //recherche dans event
        if($request->choice==='2'){

            $results = Event::query()->where('name', $request->name)->pluck('name');
        }
        //recherche dans user->pseudo
        if($request->choice==='3'){

            $results = User::query()->where('pseudo', $request->name)->pluck('pseudo');
        }


        //Quand pas de resultats
        if($results->isEmpty()){
            $results[0] = 'Pas de résultats';
        }



        //
        //preparation de la vue à renvoyer
        //

        $events = Event::query()->pluck('name', 'id');
        $disciplines = Discipline::query()->pluck('name', 'id');
        $users = User::query()->pluck('pseudo', 'id');

        return view('search/advancedSearch', [
            'pageTitle' => 'Recherche avancée',
            'results' => $results,
            'events' => $events,
            'disciplines' => $disciplines,
            'users' => $users,
        ]);
    }
}
