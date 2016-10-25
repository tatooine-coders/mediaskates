<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Comment;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhotoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $photos=Photo::query()->paginate(1);
//
//        return view('photos/index', [
//            'pageTitle' => 'Liste des photos',
//            'photos'=>$photos
//        ]);
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        return view('photos/show', [
            'pageTitle' => 'Photo',
            'photo' => $photo,
        ]);
    }
}
