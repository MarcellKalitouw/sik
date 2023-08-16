<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index()
    {
        // dd('index');
        return view('kategori.index',[
            'kategori' => Kategori::all()
        ]);
    }

    public function create()
    {
        //
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        //
        $input = $request->validate([
            'nama' => 'required|unique:kategoris,nama',
        ]);
        // dd($input);
        $kategori = Kategori::create($input);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori telah disimpan');
    }

    public function show(Kategori $kategori)
    {
        //
        
    }

    public function edit( $id)
    {
        //
        return view('kategori.edit',[
            'kategori' => Kategori::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $input = $request->validate([
            'nama' => 'required|unique:kategoris,nama',
        ]);
        // dd($input);
        $kategori = Kategori::where('id',$id)->update($input);

        return redirect()->route('kategori.index')->with('success', 'Data Kategori telah diupdate');
    }

    public function destroy($id)
    {
        //
        Kategori::where('id', $id)->delete();
        return redirect()->route('kategori.index')->with('delete', 'Data Kategori telah diupdate');
    }
}
