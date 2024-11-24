<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{PencatatanKeuangan};
use View, DB, Carbon\Carbon;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    //
    public function index($date=null){
        $monthList = $this->showListMonth();

        // dd($monthList);
        return view('laporan.index', [
            'pencatatan_keuangan' => PencatatanKeuangan::leftJoin('gambars','pencatatan_keuangans.id_gambar','gambars.id')
                             ->select(  'pencatatan_keuangans.*', 
                                        'gambars.gambar as gambar', 
                                    )
                             ->get(),
            'monthList' => $monthList
        ]);
    }
    // public function filter(Request $request){
    public function filter($tipe=null, $value=nul){
        // dd($tipe, $value);
        // $input  = (object) [
        //         'tipe' => $tipe,
        //         'value' => $value
        // ];
        $input = new \stdClass();
        $input->tipe = $tipe;
        $input->value = $value;
        // dd($input);

        $dataFilter;
        if ($input->tipe == 'triwulan') {
            $dataFilter = $this->filterTriwulan($input);
        }
        if($input->tipe == 'perbulan'){
            $dataFilter = $this->filterPerbulan($input);
        }
        if($input->tipe == 'pertahun'){
            $dataFilter = $this->filterPertahun($input);
        }
        if($input->tipe == 'rentangWaktu'){
            $input->value = explode('=', $input->value);
            // dd($input);
            $dataFilter = $this->filterRentangWaktu($input);
        }

        
        // dd($dataFilter);
        // Log::info($input);
        

        // return response()->json(['success'=>'Got Simple Ajax Request.']);
        return Excel::download(new LaporanExport("export.export-transaksi", $dataFilter), 'new_transaksi.xlsx');

    }

    // public function exportLaporan ($datFilter) {

    //     return Excel::download(new LaporanExport("export.export-transaksi", $dataFilter), 'new_transaksi.xlsx');
    // }

    public function filterRentangWaktu($input){
        // dd($input['value']['end']);
        // $startDate  = Carbon::create($input['value']['start'])->format('Y-m-d');
        // $endDate  = Carbon::create($input['value']['end'])->format('Y-m-d');

        // dd($startDate, $endDate);
        
        $records = PencatatanKeuangan::whereDate('created_at', '>=', $input->value[0])
                        ->whereDate('created_at', '<=', $input->value[1])
                        ->get();
        return $records;
    }

    public function filterPertahun($input){
        $startDate  = Carbon::create($input->value.'-01-01')->format('Y-m-d');
        $endDate = Carbon::create($startDate)->endOfYear()->format('Y-m-d');

        // dd($startDate, $endDate);
        
        $records = PencatatanKeuangan::whereDate('tgl', '>=', $startDate)
                        ->whereDate('tgl', '<=', $endDate)
                        ->get();
        return $records;
    }

    public function filterPerbulan($input){
        $startDate  = $input->value;
        $endDate = Carbon::create($startDate)->endOfMonth()->format('Y-m-d');
        $records = PencatatanKeuangan::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->get();
        return $records;
    }

    public function filterTriwulan($input){
        switch ($input->value) {
            case 'triwulan1':
                $startDate = Carbon::create(Carbon::now()->year, 1, 1);
                $endDate = Carbon::create(Carbon::now()->year, $startDate->month)->addDays(89);
                break;
            case 'triwulan2':
                $startDate = Carbon::create(Carbon::now()->year, 4, 1);
                $endDate = Carbon::create(Carbon::now()->year, $startDate->month)->addDays(90);
                break;
            case 'triwulan3':
                $startDate = Carbon::create(Carbon::now()->year, 7, 1);
                $endDate = Carbon::create(Carbon::now()->year, $startDate->month)->addDays(91);
                break;
            case 'triwulan4':
                $startDate = Carbon::create(Carbon::now()->year, 10, 1);
                $endDate = Carbon::create(Carbon::now()->year, $startDate->month)->addDays(91);
                break;
            default:
                # code...
                break;
        }
        // dd($startDate, $endDate);
        // dd($records);
        $records = PencatatanKeuangan::whereDate('created_at', '>=', $startDate)
                        ->whereDate('created_at', '<=', $endDate)
                        ->get();
        return $records;
    }

    public function showListMonth(){
        
        $currentMonth = date('m'); // Get the current month (e.g., '07' for July)
        $arrayMonth = array();

        // Create an array of month names
        $monthNames = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        for ($i=1; $i <= 12 ; $i++) { 
            $monthObject = new \stdClass();
            $monthObject->month = $monthNames[$i];
            // $monthObject->date = date('Y-m-d');
            $monthObject->date = Carbon::create(date('Y'), $i, 1)->toDateString();

            array_push($arrayMonth, $monthObject);
        }


        // Set the month name and date inside the object

         // Get the current date in 'Y-m-d' format

        return $arrayMonth;
        // Encode the object as JSON
        // $jsonObject = json_encode($monthObject);
    }
}
