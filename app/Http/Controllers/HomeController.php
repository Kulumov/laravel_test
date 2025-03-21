<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $news = News::latest()->limit(6)->get();
        return view("pages.index", compact("news"));
    }
}
