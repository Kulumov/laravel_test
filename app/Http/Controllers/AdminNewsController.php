<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all()->reverse();
        return view("pages.admin.news.index", compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.news.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $validatedData['author_id'] = auth()->user()->id;

        $path = request()->file("image")->store('images', 'public');
        $validatedData["image"] = $path;

        News::create($validatedData);
        return redirect("/admin/news");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newsInfo = News::findOrFail($id);
        return view("pages.admin.news.show", compact("newsInfo"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $newsInfo = News::findOrFail($id);
        return view("pages.admin.news.edit", compact("newsInfo"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            "name" => "required|string|max:255",
            "description" => "required|string",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $news = News::findOrFail($id);

        Storage::disk('public')->delete($news->image);

        $path = request()->file("image")->store('images', 'public');
        $validatedData["image"] = $path;

        $news->update($validatedData);

        return redirect('/admin/news/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $newsImage = $news->image;

        Storage::disk('public')->delete($newsImage);
        $news->delete();

        return redirect('/admin/news');
    }
}
