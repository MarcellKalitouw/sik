@extends('partials.layout')

@section('title', 'Dashboard')

@section('content')
      <div class="content-body">
            <div class="container-fluid">
               

                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-money text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Pemasukkan</div>
                                    <div class="stat-digit">Rp.{{ number_format($totalPemasukkan, 0) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-money text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Pengeluaran</div>
                                    <div class="stat-digit">Rp.{{ number_format($totalPengeluaran) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Selisih</div>
                                    <div class="stat-digit">Rp.{{ number_format($selisih) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                        <div class="accordion__item">
                            <div class="accordion__header accordion__header--primary collapsed" data-toggle="collapse" data-target="#header-bg_collapseOne" aria-expanded="false">
                                <span class="accordion__header--icon"></span>
                                <span class="accordion__header--text">Filter Data Pie Chard & Bar Chart</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-bg_collapseOne" class="accordion__body collapse" data-parent="#accordion-seven" style="">
                                <div class="accordion__body--text">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label-lg">Filter Per Bulan (Pie Chart)</label>
                                        <div class="col-sm-10">
                                            <input type="month"  id="bulan" name="bulan" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label-lg">Filter Per Tahun (Bar Chart)</label>
                                        <div class="col-sm-10">
                                            <select name="tahun"  id="tahun"  class="form-control form-control-lg">
                                                <option selected disabled>~Pilih Tahun~</option>
                                               
                                                @for ($i = 0; $i < 4; $i++)
                                                    <option value={{2025 - $i}} >{{2025 - $i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <a href="" id="linkFilter" class="btn btn-success" onclick="getDataFilter()">Filter</a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Fee Collections and Expenses</h4>
                            </div>
                            <div class="card-body">
                                <div class="ct-bar-chart mt-5"></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kategori Pendapatan</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="doughnut_chart" width="500px" height="400px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kategori Pengeluaran</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="doughnut_chart2" width="500px" height="400px"></canvas>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-1"></div> --}}
                    <div class="col-lg-8 col-sm-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pencatatan Keuangan per Tahun</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart_1"></canvas>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="year-calendar"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>

                    
                </div>
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lima Catatan Keuangan Terakhir</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="table student-data-table m-t-20" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nama Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                                {{-- <th>Opsi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($dataPencatatanTerakhir as $item)
                                                <tr style="color: black">
                                                    
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ date_format( new DateTime($item->tgl), 'D, d M Y ')  }}</td>
                                                    <td>Rp.{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                                    <td>{{ $item->from_to }}</td>
                                                    <td style="text-transform:uppercase">
                                                        @if ($item->tipe == 'pemasukkan')
                                                            <span class="badge badge-success">{{ $item->tipe }}</span>
                                                        @else
                                                            <span class="badge badge-danger">{{ $item->tipe }}</span>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                      <form action="{{ route('pencatatan-keuangan.destroy', $item->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('pencatatan-keuangan.edit', $item->id) }}" class="btn btn-rounded btn-warning">
                                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
                                                        </a>
                                                        <a href="{{ asset('pengeluaran/'.$item->gambar) }}" target="_blank" class="btn btn-rounded btn-info">
                                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-rounded btn-danger">
                                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>

                                                      </form>
                                                    </td> --}}
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                                {{-- <th>Opsi</th>s --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">10 Besar Pendapatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="widget-timeline">
                                    <ul class="timeline">
                                        @forelse ($sepuluhPemasukkan as $item)
                                            <li>
                                                <div class="timeline-badge success"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>Rp.{{ number_format($item->jumlah, 0, ',', '.') }}</span>
                                                    <h6 class="m-t-5">{{ $item->nama }}</h6>
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="timeline-badge dark"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    Data Tidak Ada
                                                </a>
                                            </li>
                                        @endforelse
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">10 Besar Pengeluaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="widget-timeline">
                                    <ul class="timeline">
                                        @forelse ($sepuluhPengeluaran as $item)
                                            <li>
                                                <div class="timeline-badge danger"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    <span>Rp.{{ number_format($item->jumlah, 0, ',', '.') }}</span>
                                                    <h6 class="m-t-5">{{ $item->nama }}</h6>
                                                </a>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="timeline-badge dark"></div>
                                                <a class="timeline-panel text-muted" href="#">
                                                    Data Tidak Ada
                                                </a>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    
                </div>
                
            </div>
        </div>
@endsection

@push('scriptPlus')
    
    <script>
    
    // "use strict"

    //basic bar chart

    async function filterBulan(val){
        let dataBulan = val;
        return dataBulan;
        
    }
    async function filterTahun(val){
        let dataTahun = val;
        return dataTahun;
    }

    function getDataFilter(){
        const year = $("#tahun").val();
        const month = $("#bulan").val();
        var link = document.getElementById("linkFilter"); 
        link.getAttribute("href"); 
        link.href = `/dashboard/${month ? month : 'null'}/${year? year : 'null'}`;


    }


    const barChart_1 = document.getElementById("barChart_1").getContext('2d');
    const arrayPengeluaran = {!! json_encode($arrayChartPengeluaran) !!};
    const arrayPemasukkan = {!! json_encode($arrayChartPemasukkan) !!};

    
    // console.log('arrayPemasukkan', {!! json_encode($arrayChartPengeluaran) !!});

    barChart_1.height = 100;

    new Chart(barChart_1, {
        type: 'bar',
        data: {
            defaultFontFamily: 'Poppins',
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul",'Ags', 'Sept', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                    label: "Pengeluaran",
                    
                    data: arrayPengeluaran.map((v) => v.jumlah),
                    borderColor: 'rgba(26, 51, 213, 1)',
                    borderWidth: "0",
                    backgroundColor: 'rgba(109, 123, 250, 98)'
                },
                {
                    label: "Pemasukkan",
                    data: arrayPemasukkan.map((v) => v.jumlah),
                    borderColor: 'rgba(26, 51, 213, 1)',
                    borderWidth: "0",
                    backgroundColor: 'rgba(250, 168, 135, 98)'
                }
            ]
        },
        options: {
            legend: false, 
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                yAxes: [{
                    ticks: {
                            beginAtZero: true,
                            // stepSize: 500000,

                            // Return an empty string to draw the tick line but hide the tick label
                            // Return `null` or `undefined` to hide the tick line entirely
                            userCallback: function(value, index, values) {
                                // Convert the number to a string and splite the string every 3 charaters from the end
                                value = value.toString();
                                value = value.split(/(?=(?:...)*$)/);

                                // Convert the array to a string and format the output
                                value = value.join('.');
                                return 'Rp ' + value;
                            }
                        }
                }],
                xAxes: [{
                    // Change here
                    barPercentage: 0.5
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, chart){
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': Rp ' + Intl.NumberFormat('id-ID').format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
    </script>

    <script>
        const doughnut_chart = document
        .getElementById("doughnut_chart")
        .getContext("2d");

        const doughnut_chart2 = document
        .getElementById("doughnut_chart2")
        .getContext("2d");

        const dataPendapatan = {!! json_encode($arrayPiePemasukkan) !!};
        const dataPengeluaran = {!! json_encode($arrayPiePengeluaran) !!};
        console.log('data', dataPendapatan, dataPengeluaran);
        // doughnut_chart.height = 100;

        new Chart(doughnut_chart, {
            type: "doughnut",
            data: {
                defaultFontFamily: "Poppins",
                datasets: [
                    {
                        data: dataPendapatan.map((v) => v.data),
                        borderWidth: 0,
                        backgroundColor: [
                            "rgba(0, 0, 128, .9)",
                            "rgba(0, 0, 128, .7)",
                            "rgba(0, 0, 128, .5)",
                            "rgba(0, 0, 128, .4)",
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 0, 128, .5)",
                            "rgba(0, 0, 128, .4)",
                            "rgba(0, 0, 128, .3)",
                            "rgba(0, 0, 128, .2)",
                        ],
                    },
                ],
                labels: dataPendapatan.map((v) => v.label)
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        });

        new Chart(doughnut_chart2, {
            type: "doughnut",
            data: {
                defaultFontFamily: "Poppins",
                datasets: [
                    {
                        data: dataPengeluaran.map((v) => v.data),
                        borderWidth: 0,
                        backgroundColor: [
                            "rgba(0, 0, 128, .9)",
                            "rgba(0, 0, 128, .7)",
                            "rgba(0, 0, 128, .5)",
                            "rgba(0, 0, 128, .4)",
                        ],
                        hoverBackgroundColor: [
                            "rgba(0, 0, 128, .5)",
                            "rgba(0, 0, 128, .4)",
                            "rgba(0, 0, 128, .3)",
                            "rgba(0, 0, 128, .2)",
                        ],
                    },
                ],
                labels: dataPengeluaran.map((v) => v.label)
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        });
    </script>
@endpush