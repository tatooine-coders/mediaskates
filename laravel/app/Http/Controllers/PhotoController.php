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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::withCount('votes')->findOrFail($id);

        return view('photos/show', [
            'pageTitle' => 'Photo',
            'photo' => $photo,
        ]);
    }
}
