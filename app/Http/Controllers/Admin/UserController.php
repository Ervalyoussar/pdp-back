<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incoming_fields = $request->validate([
            'name'     => ['required', 'min:2', 'max:255'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:2', 'max:255'],
        ]);

        // Hash it
        $incoming_fields['password'] = bcrypt($incoming_fields['password']);

        User::create($incoming_fields);
    }

    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     $users = User::all();
    //     return response()->json(['all' => 'err']);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreUserRequest $request)
    // {
    //     $user = User::create($request->all());
    //     return response()->json($user, 201);
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(User $user)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(User $user)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(User $user)
    // {
    //     //
    // }
}