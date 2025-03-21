<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;

    public function myNews()
    {
        $news = auth()->user()->news()->get()->reverse();

        return view("pages.news.index", compact("news"));
    }
    public function index()
    {
        $news = News::all()->reverse();
        return view("pages.news.index", compact("news"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.news.create");
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
        return redirect("/my_news");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newsInfo = News::findOrFail($id);
        return view("pages.news.show", compact("newsInfo"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Check if user is authorized
        $news = News::findOrFail($id);
        $this->authorize('update', $news);
        return view('pages.news.edit', compact("news"));
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
        $this->authorize('update', $news);

        Storage::disk('public')->delete($news->image);

        $path = request()->file("image")->store('images', 'public');
        $validatedData["image"] = $path;

        $news->update($validatedData);

        return redirect('/news/' . $news->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $news = News::findOrFail($id);
        $this->authorize('delete', $news);
        $newsImage = $news->image;

        Storage::disk('public')->delete($newsImage);
        $news->delete();

        return redirect('/my_news');
    }
}
