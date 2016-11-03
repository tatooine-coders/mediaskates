<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Comment;
use App\Photo;
use App\PhotoUserTag;
use App\User;
use App\Vote;
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
        $users = User::query()->pluck('pseudo', 'id');
        $user_id = auth()->user()->id;
        $vote = Vote::query()->where('photo_id', $id)->where('user_id', $user_id)->first();
//      $tags = PhotoUserTag::query()->where('photo_id', $id)->get();

        return view('photos/show', [
            'pageTitle' => 'Photo',
            'photo' => $photo,
            'users' => $users,
            'vote' => $vote,
        ]);
    }
}
