<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function update(User $user, Request $request)
    {
        $user->fill($request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
        ]))->update();

        return response()->json([
            'message' => 'User updated!'
        ]);
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return response()->json([
            'message' => 'User deleted!'
        ]);
    }
}
