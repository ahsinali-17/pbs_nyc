<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);

        return view('portal.blog.article.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.blog.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $data = $request->only(['title', 'content', 'category_id']);
        $data['isActive'] = $request->has('isActive');
        $data['slug'] = Str::slug($data['title']);

        if ($request->file('featured')) {
            $data['featured'] = $request->file('featured')->store('public/articleimages');
        }

        $article = new Article($data);
        $article->save();

        Session::flash('success', "Article: <i>" . $article->title . "</i> successfully created.");

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Blog\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
//        dd($article);
        return view('portal.blog.article.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Blog\Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('portal.blog.article.edit')->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $data = $request->only(['title', 'content', 'category_id']);
        $data['slug'] = Str::slug($data['title']);
        $data['isActive'] = $request->has('isActive');

        if ($request->file('featured')) {
            $data['featured'] = $request->file('featured')->store('public/articleimages');
            Storage::delete($article->featured);
        }

        $article->update($data);
        $article->save();

        Session::flash('success', "Article: <i>" . $article->title . "</i> successfully updated.");

        return redirect()->route('article.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Blog\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Storage::delete($article->featured);
        $title = $article->title;
        $article->delete();

        Session::flash('success', "Article: <i>" . $title . "</i> successfully deleted.");

        return redirect()->route('article.index');
    }
}
