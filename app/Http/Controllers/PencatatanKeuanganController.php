<?php

namespace App\Http\Controllers;

use App\Models\{PencatatanKeuangan, Gambar};
use Illuminate\Http\Request;
use View, DB;


class PencatatanKeuanganController extends Controller
{
    public function validateForm($req){
        $req->validate([
            'gbr' => 'required',
            'tgl' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'from_to' => 'required',
            'tipe' => 'required'
        ]);
    }
    public function findId($id){
        $find = PencatatanKeuangan::find($id);
        return $find;
    }
    public function index()
    {
        //
        return view('pencatatan_keuangan.index', [
            'pencatatan_keuangan' => PencatatanKeuangan::leftJoin('gambars','pencatatan_keuangans.id_gambar','gambars.id')
                             ->select(  'pencatatan_keuangans.*', 
                                        'gambars.gambar as gambar', 
                                    )
                             ->get()
        ]);
    }

   
    public function create()
    {
        //
        // return view('pencatatan_keuangan.create');

        return View::make('pencatatan_keuangan.create');
    }

   
    public function store(Request $request)
    {
        //
        // dd($request);
        DB::beginTransaction();
        $validate = $this->validateForm($request);
        
        try {
            $data = $request->except(['_token']);

            $pk = PencatatanKeuangan::create($data);

            $fileName = time().'_'.$request->gbr->getClientOriginalName();
            $data['gbr']->move('pengeluaran', $fileName);

            $files['gambar'] = $fileName;
            $files['nama'] = $data['nama'];
            // dd($files);

            $gambar = Gambar::create($files);
            // dd($gambar, $pk->id);
            
            $pk = PencatatanKeuangan::where('id', $pk->id)->update(['id_gambar' => $gambar->id]);

            DB::commit();
            return redirect()->route('data-pengeluaran.index')->with('success', 'Data Pengeluaran berhasil disimpan');
            

        } catch (\Exception $e) {
                dd($e);
                DB::rollback();
                return redirect()->route('data-pengeluaran.create')->with('error', 'Data Pengeluaran gagal disimpan');
        }
        
    }

   
    public function show($id)
    {
        //
        
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
