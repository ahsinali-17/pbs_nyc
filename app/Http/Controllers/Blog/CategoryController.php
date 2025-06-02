<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('portal.blog.category.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portal.blog.category.create');
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
            'name' => 'required|max:255',
            'featured' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $data = $request->only(['name', 'description']);
        $data['slug'] = Str::slug($data['name']);

        if ($request->file('featured')) {
            $data['featured'] = $request->file('featured')->store('public/categoryimages');
        }

        $category = new Category($data);
        $category->save();

        Session::flash('success', "Category: <i>" . $category->name . "</i> successfully created.");

        return redirect()->route('category.show', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Blog\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('portal.blog.category.show')->withCategory($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Blog\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('portal.blog.category.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Blog\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'featured' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $data = $request->only(['name', 'description']);
        $data['slug'] = Str::slug($data['name']);

        if ($request->file('featured')) {
            $data['featured'] = $request->file('featured')->store('public/categoryimages');
            Storage::delete($category->featured);
        }

        $category->update($data);
        $category->save();

        Session::flash('success', "Category: <i>" . $category->name . "</i> successfully updated.");

        return redirect()->route('category.show', $category->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Blog\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->featured);
        $name = $category->name;
        $category->delete();

        Session::flash('success', "Category: <i>" . $name . "</i> successfully deleted.");

        return redirect()->route('category.index');
    }
}
