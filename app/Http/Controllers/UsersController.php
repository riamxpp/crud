<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function index()
    {

        $users = User::get();

        return view("user.index", [
            "users" => $users
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        // $user = User::find($id);
        // $user = User::where('id', $id)->get(); // Pega o usuario onde id dele é igual o $id 
        // $user = User::where('id', $id)->first(); // Funciona igual ao find
        // dd($user);
        $user = User::find($id);

        return view('user.show', [
            'user' => $user
        ]);
    }

    
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request->except(['_token', '_method']));
        $data = $request->only(['nome', 'email']);

        $user = User::find($id);
        $user->name = $data["nome"];
        $user->email = $data["email"];
        
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete($id);
        
        return redirect()->back();
    }
}
