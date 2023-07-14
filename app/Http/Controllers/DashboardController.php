<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{PencatatanKeuangan};
use View, DB, Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(){
        
        $pengeluaranBulanSkrg = PencatatanKeuangan::where('tipe', 'pengeluaran')
                                ->whereYear('tgl', Carbon::now()->year)
                                ->whereMonth('tgl', Carbon::now()->month)
                                ->sum('jumlah');
        $pemasukkanBulanSkrg = PencatatanKeuangan::where('tipe', 'pemasukkan')
                                ->whereYear('tgl', Carbon::now()->year)
                                ->whereMonth('tgl', Carbon::now()->month)
                                ->sum('jumlah');

        $groupByMonth = "YEAR(tgl),MONTH(tgl)";
        $pengeluaranPerBulan = DB::table('pencatatan_keuangans')
                      ->where('tipe', 'pengeluaran')
                      ->where('tgl','LIKE',Carbon::now()->year."%")
                      ->whereNull('deleted_at')
                      ->selectRaw("YEAR(tgl) as Year, MONTH(tgl) as month, count(id) as value, sum(jumlah) as jumlah")
                      ->groupByRaw($groupByMonth)
                      ->get();      
        $pemasukkanPerBulan = DB::table('pencatatan_keuangans')
                      ->where('tipe', 'pemasukkan')
                      ->where('tgl','LIKE',Carbon::now()->year."%")
                      ->whereNull('deleted_at')
                      ->selectRaw("YEAR(tgl) as Year, MONTH(tgl) as month, count(id) as value, sum(jumlah) as jumlah")
                      ->groupByRaw($groupByMonth)
                      ->get();

        $arrayChartPengeluaran = $this->remakeArray($pengeluaranPerBulan);
        $arrayChartPemasukkan = $this->remakeArray($pemasukkanPerBulan);

        $dataPencatatanTerakhir = PencatatanKeuangan::take(10)->orderBy('tgl','desc')->get();
        $sepuluhPenguluaran = PencatatanKeuangan::orderByDesc('jumlah')->where('tipe','pengeluaran')->take(10)->get();
        $sepuluhPemasukkan = PencatatanKeuangan::orderByDesc('jumlah')->where('tipe','pemasukkan')->take(10)->get();
        
        // dd($pengeluaranPerBulan, $pemasukkanPerBulan, $arrayChartPemasukkan);
        
        return view('dashboard.index', [
                'totalPengeluaran' => $pengeluaranBulanSkrg,
                'totalPemasukkan' => $pemasukkanBulanSkrg,
                'selisih' => $pemasukkanBulanSkrg - $pengeluaranBulanSkrg,
                'arrayChartPengeluaran' => $arrayChartPengeluaran,
                'arrayChartPemasukkan' => $arrayChartPemasukkan,
                'dataPencatatanTerakhir' => $dataPencatatanTerakhir,
                'sepuluhPengeluaran' => $sepuluhPenguluaran,
                'sepuluhPemasukkan' => $sepuluhPemasukkan
            ]
        );
    }


    public function remakeArray($array){
        $arrayPemasukkan = array();
        for ($i=1; $i < 13; $i++) { 
            $newObj = new \stdClass();
            $newObj->month = $i;
            $newObj->jumlah = 0;
            foreach ($array as $pl) {
                if($pl->month == $i){
                    $newObj->jumlah = $pl->jumlah;
                    break;
                }    
            }
            array_push($arrayPemasukkan, $newObj);
        }

        return $arrayPemasukkan;
    }
}
