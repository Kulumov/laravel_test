<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function account()
    {
        $user = auth()->user();
        return view("pages.user.info", compact("user"));
    }

    public function changePassword()
    {
        return view("pages.user.change-password");
    }

    public function handleNewPassword(Request $request)
    {
        $validatedPassword = $request->validate(["password" => "required|string|min:8|confirmed"]);
        $newPassword = Hash::make($validatedPassword["password"]);

        auth()->user()->password = $newPassword;

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");

    }
}
