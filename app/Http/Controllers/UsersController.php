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
        return view('user.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email']);
        $data['password'] = bcrypt(rand(12345678, 87654321));

        User::create($data);
        return redirect()->route('user.index');  
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

    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete($id);
        
        return redirect()->back();
    }
}
