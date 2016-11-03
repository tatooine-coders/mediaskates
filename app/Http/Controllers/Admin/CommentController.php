<?php
namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends \App\Http\Controllers\Admin\AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = Comment::query()
            ->get();

        return view('admin/comments/index', [
            'pageTitle' => 'Commentaires',
            'comments' => $comments,

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        Session::flash('message', 'Commentaire supprimé.');

        return redirect()->route('admin.comment.index');
    }
}
