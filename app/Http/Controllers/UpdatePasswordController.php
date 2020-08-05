<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'confirmed|min:8',
        ]);

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return response()->json([
             'message' => 'Password changed!'
        ]);
    }
}
