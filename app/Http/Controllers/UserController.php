<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user();
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'string|max:255',
            'password' => 'confirmed|min:8',
        ]);

        $user->fill($data);
        $user->save([
            'password' => bcrypt($request->password),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
