<?php
namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Photo;

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

        return view('photos/index',[
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
        $photo = Photo::findOrFail($id);
        $comments = Comment::query()->where('photo_id', $id)->get();

        return view('photos/show', [
            'pageTitle' => 'Photo',
            'photo' => $photo,
            'comments' => $comments,
        ]);
    }
}
