<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ItemNotFoundException;

class UserController extends Controller
{
    public function register(Request $request) : JsonResponse
    {
        $incoming_fields = $request->validate([
            'name'     => ['required', 'min:2', 'max:255'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:2', 'max:255'],
        ]);

        // Hash it
        $incoming_fields['password'] = Hash::make($incoming_fields['password']);
        $incoming_fields['role_id'] = Role::all()->where('name', '=', 'user')->first()->id;

        User::create($incoming_fields);

        return response()->json([
            'status' => 'success',
            'description' => 'user created successfully',
        ]);
    }

    public function edit(Request $request, int $id) : JsonResponse
    {
        try
        {
            $user = User::all()->where('id', '=', $id)->firstOrFail();
        }
        catch (ItemNotFoundException $e)
        {
            return response()->json([
                'status' => 'error',
                'description' => 'user not found',
            ], 404);
        }

        $user->name     = $request->input('name') ?? $user->name;
        $user->email    = $request->input('email') ?? $user->email;
        $user->password = empty($request->input('password')) ? $user->password : Hash::make($request->input('password'));

        $user->save();

        return response()->json([
            'status' => 'success',
            'description' => 'user updated successfully',
            'user' => $user->toArray(),
        ]);
    }

    public function delete(Request $request, int $id) : JsonResponse
    {
        $admin_role_id = Role::all()->where('name', '=', 'admin')->first()->id;

        try
        {
            $user_to_be_deleted = User::all()->where('id', '=', $id)->firstOrFail();
        }
        catch (ItemNotFoundException $e)
        {
            return response()->json([
                'status' => 'error',
                'description' => 'user not found'
            ], 404);
        }

        // Abort early if trying to delete the last admin account
        if ( $user_to_be_deleted->role_id == $admin_role_id &&
             User::all()->where('role_id', '=', $admin_role_id)->count() <= 1 )
        {
            // I'm a teapot
            return response()->json([
                'status' => 'error',
                'description' => 'trying to delete last admin account'
            ], 418);
        }

        $user_to_be_deleted->delete();

        return response()->json([
            'status' => 'success',
            'description' => 'user deleted successfully',
        ]);
    }

    public function get(Request $request, int $id) : JsonResponse
    {
        try
        {
            $user = User::all()->where('id', '=', $id)->firstOrFail();
        }
        catch (ItemNotFoundException $e)
        {
            return response()->json([
                'status' => 'error',
                'description' => 'user not found',
            ], 404);
        }

        return response()->json($user->toArray());
    }
}
