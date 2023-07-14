<?php

namespace App\Exports;

use App\Models\PencatatanKeuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;


class LaporanExport implements FromView, WithColumnWidths
{

    public $data;
    public $view;

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 45,
            'C' => 20,
            'D' => 45,
            'E' => 20,
            'F' => 20,  
            'G' => 10,
            'H' => 30,                
        ];
    }

    public function __construct($view, $data = "")
    {
            $this->view = $view;
            $this->data = $data;
    }

    public function view(): View
    {
        // dd($this->data);
        return view('export.laporan', [
            'pencatatanKeuangan' => $this->data
        ]);
    }
}
