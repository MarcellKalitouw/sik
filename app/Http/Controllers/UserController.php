<?php

namespace App\Http\Controllers;

use App\Models\{User};
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // dd('index');
        return view('user.index',[
            'user' => User::all()
        ]);
    }

    public function create()
    {
        //
        return view('user.create');
    }

    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'name' => 'required|unique:users,name',
            'tipe' => 'required',
            'password' => 'required',
        ]);
        // dd($input);
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);

        return redirect()->route('user.index')->with('success', 'Data User telah disimpan');
    }

    public function show(User $user)
    {
        //
        
    }

    public function edit( $id)
    {
        //
        return view('user.edit',[
            'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $old = User::find($id);
        // dd($old);
        $input = $request->validate([
            'name' => 'required',
            'tipe' => 'required',
        ]);
        // dd($input['name']);
        
        $user = User::where('id',$id)->update($input);

        return redirect()->route('user.index')->with('success', 'Data User telah diupdate');
    }

    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->route('user.index')->with('delete', 'Data User telah diupdate');
    }
}
