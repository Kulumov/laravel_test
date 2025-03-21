<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
class AdminPanelController extends Controller
{
    public function index()
    {
        $news = News::latest()->limit(5)->get();
        $users = User::withCount("news")->where("id", "!=", auth()->user()->id)->limit(5)->get();

        return view("pages.admin.home-page", compact(["news", "users"]));
    }
}
