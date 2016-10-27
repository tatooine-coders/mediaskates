<?php
namespace App\Http\Controllers;

use App\Discipline;
use App\Event;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advancedSearch()
    {
        return view('search/advancedsearch', [
            'pageTitle' => 'Recherche avancée',
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
        switch ($request->choice) {
            //recherche dans discipline
            case '1':
                $results = Discipline::query()
                    ->where('name', 'like', '%' . $request->name . '%')
                    ->get();
                $url = 'discipline';
                break;

            //recherche dans event
            case '2':
                $results = Event::query()
                    ->where('name', 'like', '%' . $request->name . '%')
                    ->get();
                $url = 'event';
                break;

            //recherche dans user->pseudo
            case '3':
                $results = User::query()
                    ->where('pseudo', 'like', '%' . $request->name . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name . '%')
                    ->orWhere('first_name', 'like', '%' . $request->name . '%')
                    ->get();
                $url = 'user';
                break;
        }

        return view('search/advancedsearch', [
            'pageTitle' => 'Recherche avancée',
            'results' => $results,
            'url' => $url,
        ]);
    }
}
