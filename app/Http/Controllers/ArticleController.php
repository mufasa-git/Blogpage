<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Analyze;
use App\User;
use App\Comment;
use Auth;
class ArticleController extends Controller
{
    //
     public function index(Request $request)
    {
        $articles = Article::latest()->paginate(5);

            $user_role = Auth::user()->role;

        $userId = Auth::id();

        return view('articles.index',compact('articles', 'user_role', 'userId'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('articles.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
	        'image'         =>  'required|image|max:5000'

        ]);
   		$image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('articlePhoto'), $new_name);
        $userId = Auth::id();

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $new_name;
        $article->user_id = $userId;
        $article->save();

        $analyze = new Analyze();
        $analyze->visitor_cnt = 0;
        $analyze->article_id = $article->id;
        $analyze->save();



        return redirect()->route('articles.index')->with('success','Article created successfully');
    }
    public function show($id)
    {
        $comments = Comment::with('user')->get();
        $article= Article::find($id);
        $analyze = Analyze::where('article_id', '=', $id) -> first();
        if ($analyze) {
            $analyze->visitor_cnt += 1;
            $analyze->update(); 
        } 
        return view('articles.show',compact('article', 'comments'));
    }
    public function edit($id)
    {
        $article= Article::find($id);
        return view('articles.edit',compact('article'));
    }
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'title'    =>  'required',
                'content'     =>  'required',
                'image'         =>  'image|max:5000'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('articlePhoto'), $image_name);
        }
        else
        {
            $request->validate([
                'title'    =>  'required',
                'content'     =>  'required'
            ]);
        }
        $userId = Auth::id();
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $image_name;
        $article->user_Id = $userId;
        $article->save();
        return redirect()->route('articles.index')->with('success','Article updated successfully');
    }
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('articles.index')->with('success','Article deleted successfully');
    }
}
