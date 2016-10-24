<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;

class CommentController extends \App\Http\Controllers\Member\MemberController
{

    /**
     * Display a listing of the comments and the number of answers
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string',
        ]);

        $data = $request->all();
        // Adding current user
        $data['user_id'] = Auth()->user()->id;

        Comment::create($data);

        // Redirection et message
        \Session::flash('message', 'Commentaire ajouté');
        return redirect()->route('photo.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
