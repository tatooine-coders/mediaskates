<?php
namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos=Photo::query()->get();

        return view('photos/index', [
            'pageTitle' => 'Liste des photos',
            'photos'=>$photos
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
