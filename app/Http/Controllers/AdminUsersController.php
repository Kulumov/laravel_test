<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("id", "!=", auth()->user()->id)->get()->reverse();
        return view("pages.admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedInput = $request->validate([
            "name" => "required|string|max:100",
            "email" => "required|string|max:100",
            "password" => "required|string|min:8|confirmed",
            "is_admin" => "required|boolean",
        ]);

        $validatedInput["password"] = Hash::make($validatedInput["password"]);

        User::create($validatedInput);

        return redirect("/admin/users");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("pages.admin.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedInput = $request->validate([
            "name" => "required|string|max:100",
            "email" => "required|string|max:100",
            "password" => "required|string|min:8|confirmed",
            "is_admin" => "required|boolean",
        ]);

        $validatedInput["password"] = Hash::make($validatedInput["password"]);


        User::findOrFail($id)->update($validatedInput);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
}
