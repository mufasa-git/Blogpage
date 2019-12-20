<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Session;
use Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $article_id)
    {
        //
        $this->validate($request, array(
            'name' => 'required|max:255',
            'comment' => 'required|min:1|max:2000'
        ));
        $user = Auth::id();
        $article = Article::find($article_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->article()->associate($article);
        if (is_null($user)) {
            $comment->user_id = 2;
        }
        else
            $comment->user_id = $user;
        $comment->save();
        Session::flash('success', 'Comment was added');
        if (is_null($user)) {
            return redirect()->route('blogs.show', [$article->id]);
        }
        else
            return redirect()->route('articles.show', [$article->id]);
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
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);
        $this->validate($request, array('comment' => 'required'));
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success', 'Comment updated');
        return redirect()->route('articles.edit', $comment->article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }

    public function destroy($id)
    {
        //
        $comment = Comment::find($id);
        $article_id = $comment->article->id;
        $comment->delete();
        Session::flash('success', 'Deleted Comment');
        return redirect()->route('articles.edit', $article_id);
    }
}
