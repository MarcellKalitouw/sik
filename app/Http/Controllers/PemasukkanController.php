<?php

namespace App\Http\Controllers;

use App\Models\{Pemasukkan, PencatatanKeuangan, Gambar, Kategori};
use Illuminate\Http\Request;
use View, DB, File;
class PemasukkanController extends Controller
{
    public function validateForm($req){
        $req->validate([
            'id_kategori' => 'required',
            'tgl' => 'required',
            'gbr' => 'required',
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
        return view('pemasukkan.index', [
            'pemasukkan' => PencatatanKeuangan::leftJoin('gambars','pencatatan_keuangans.id_gambar','gambars.id')
                            ->leftJoin('kategoris','pencatatan_keuangans.id_kategori','kategoris.id')
                            ->where('pencatatan_keuangans.tipe', 'pemasukkan')
                            ->select(
                                'pencatatan_keuangans.*', 
                                'gambars.gambar as gambar', 
                                'kategoris.nama as kategori', 
                            )
                            ->latest()
                            ->get()
        ]);
    }

   
    public function create()
    {
        //
        return view('pemasukkan.create', [
            'kategori' => Kategori::all()
        ]);
    }

   
    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        $validate = $this->validateForm($request);
        
        try {
            $data = $request->except(['_token']);
            $kategori = Kategori::firstOrCreate(
                        ['id' => $request->id_kategori],
                        ['nama' => $request->id_kategori]
                    );
            // dd($kategori->nama);
            $data['id_kategori']= $kategori->id;

            $pk = PencatatanKeuangan::create($data);

            $fileName = time().'_'.$request->gbr->getClientOriginalName();
            $data['gbr']->move('pemasukkan', $fileName);

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
        return view('pemasukkan.create', [
            'pemasukkan' => $this->findId($id)
        ]);
    }

   
    public function edit($id)
    {
        //
        // dd($this->findId($id));
        return view('pemasukkan.edit', [
            'pemasukkan' => $this->findId($id),
            'kategori' => Kategori::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'id_kategori' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
            'from_to' => 'required',
            'tipe' => 'required',
            'tgl' => 'required'
        ]);
        $oldData = $this->findId($id);
        $oldGbr = Gambar::where('id', $oldData->id_gambar)->first();
        $data = $request->except(['_token', '_method', 'gbr']);
        $kategori = Kategori::firstOrCreate(
                        ['id' => $request->id_kategori],
                        ['nama' => $request->id_kategori]
                    );
        $data['id_kategori']= $kategori->id;

        
        try {
            //code...
            DB::beginTransaction();

            if(is_file($request->gbr)){
                $fileName = time().'_'.$request->gbr->getClientOriginalName(); 
                $request->gbr->move('pemasukkan', $fileName);
                File::delete('pemasukkan/'.$oldGbr->gambar);

                $files['gambar'] = $fileName;
                $files['nama'] = $data['nama'];
                $gambar = Gambar::create($files);
                $data['id_gambar'] = $gambar->id;

            }
            
            $update = PencatatanKeuangan::where('id', $id)->update($data);
            
            DB::commit();
            return redirect()->route('data-pemasukkan.index')->with('success', 'Data Pengeluaran berhasil diperbaharui');

        } catch (\Exception $e) {

                DB::rollback();
                return redirect()->route('data-pemasukkan.edit', $id)->with('error', 'Data Pengeluaran gagal diperbaharui');
        }

        

        // dd($request->except(['gbr']));
    }

    public function destroy($id)
    {
        //
        // dd($id);
        $oldData = PencatatanKeuangan::where('id', $id)->first();
        $oldGbr = Gambar::where('id', $oldData->id_gambar)->first();
        File::delete('pemasukkan/'.$oldGbr->gambar);
        PencatatanKeuangan::where('id',$id)->delete();
        Gambar::where('id', $oldData->id_gambar)->delete();
        return redirect()->route('data-pemasukkan.index')->with('delete','Data pengeluaran berhasil dihapus!!');
    }
}
