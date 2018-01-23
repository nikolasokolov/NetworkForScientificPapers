<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.Index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id = null)
    {
        $categories = null;
        if(!$category_id)
        {
            $categories = Category::all();
        }
        return view('articles.create', ['category_id' => $category_id, 'categories' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $article = Article::create([
                'title' => $request->input('title'),
                'public' => $request->input('public'),
                'text' => $request->input('text'),
                'category_id' => $request->input('category_id'),
                'user_id' => Auth::user()->id
            ]);

            if($article)
            {
                return redirect()->route('articles.show', ['article' => $article->id])->with('success', 'Article created successfully');
            }
        }
        return back()->withInput()->with('error', 'error creating new article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = Article::find($article->id);
        $categories = Category::all();
        $comments = $article->comments;
        return view('articles.show', ['article' => $article, 'comments' => $comments, 'categories' => $categories]);
    }

    public function search(Article $article)
    {
        $categories = Category::all();
        return $categories;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::find($article->id);
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $articleUpdate = Article::find($article->id)->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'public' => $request->input('public')
        ]);
        if($articleUpdate)
        {
            return redirect()->route('articles.show', ['article' => $article->id])->with('success', 'Article updated successfully');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $findarticle = Article::find($article->id);
        if ($findarticle->delete())
        {
            return redirect()->route('categories.index')->with('success', 'Article deleted successfully');
        }
        return back()->withInput()->withErrors('errors', 'Article could not be deleted');
    }
}
