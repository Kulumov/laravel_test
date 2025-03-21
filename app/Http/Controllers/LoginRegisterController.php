<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function login(): View
    {
        return view("pages.auth.login");
    }

    public function authenticate(Request $request)
    {
        $validatedInput = $request->validate(["email" => "required|string|max:100", "password" => "required|string"]);

        if (Auth::attempt($validatedInput)) {
            $request->session()->regenerate();
            return redirect()->intended(url("/"));
        }

        return back()->withErrors(["email" => "Provided creditentials do not match our records"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function register(): View
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            "name" => "required|string|max:100",
            "email" => "required|string|max:100",
            "password" => "required|string|min:8|confirmed",
        ]);

        $validatedInput["password"] = Hash::make($validatedInput["password"]);

        User::create($validatedInput);

        return redirect("/login");
    }
}
