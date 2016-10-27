<?php
namespace App\Http\Controllers\Member;

use App\PhotoUserTag;
use App\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class TagController extends \App\Http\Controllers\Member\MemberController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //afficher ses tags dans le dashboard
        $id= auth()->user()->id;
        $tags = PhotoUserTag::query()->where('user_id', $id)->get();

        return view('member/users/show', [
            'pageTitle' => 'Dashboard',
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $data=$request->all();
        PhotoUserTag::create($data);

        // Redirection et message
        Session::flash('message', 'Tag enregistré');

        return redirect()->route('photo.show', $request->photo_id);
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
