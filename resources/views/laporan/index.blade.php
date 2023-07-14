@extends('partials.layout')

@section('title', 'Pengeluaran')

@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Export Laporan</h4>
                                {{-- <a href="{{ route('pencatatan-keuangan.create') }}" class="btn btn-rounded btn-success">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                                </a> --}}

                            </div>
                            <div class="card-body">
                                <div id="accordion-seven" class="accordion accordion-header-bg accordion-bordered">
                                    <div class="accordion__item">
                                        <div class="accordion__header accordion__header--primary" data-toggle="collapse"
                                            data-target="#header-bg_collapseOne">
                                            <span class="accordion__header--icon"></span>
                                            <span class="accordion__header--text">Filter Laporan</span>
                                            <span class="accordion__header--indicator"></span>
                                        </div>
                                        <div id="header-bg_collapseOne" class="collapse accordion__body show"
                                            data-parent="#accordion-seven">
                                            <div class="accordion__body--text" style="color: black;">
                                                <div class="card-body">
                                <div class="basic-form">
                                    
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Jangka Waktu </label>
                                            <div class="col-sm-10">
                                                <select onchange="onChangeJangkaWaktu(this.value)" class="form-control form-control-lg" id="jangkaWaktu" name="jangka_waktu">
                                                    <option selected disabled>~Pilih Jangka Waktu~</option>
                                                    <option value="triwulan">Triwulan</option>
                                                    <option value="perbulan">Perbulan</option>
                                                    <option value="pertahun">Pertahun</option>
                                                    <option value="rentangWaktu">Rentang Waktu</option>
                                                </select>
                                            </div>
                                            
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row" id="triwulan" style="display: none;">
                                            <label class="col-sm-2 col-form-label-lg">Triwulan </label>
                                            <div class="col-sm-10"  style="display: hidden">
                                                <select id="inpTriwulan" class="form-control form-control-lg" name="triwulan">
                                                    <option selected disabled>~Pilih Triwulan~</option>
                                                    <option value="triwulan1">Triwulan I</option>
                                                    <option value="triwulan2">Triwulan II</option>
                                                    <option value="triwulan3">Triwulan III</option>
                                                    <option value="triwulan4">Triwulan IV</option>
                                                </select>
                                            </div>
                                            
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row" id="perbulan" style="display: none;">
                                            <label class="col-sm-2 col-form-label-lg">Bulan </label>
                                            <div class="col-sm-10"  style="display: hidden">
                                                <select id="inpBulan" class="form-control form-control-lg" name="perbulan">
                                                    <option value="" selected disabled>~Pilih Bulan~</option>

                                                    @foreach ($monthList as $item)
                                                        <option value="{{ $item->date }}">{{ $item->month }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group row" id="pertahun" style="display: none;">
                                            <label class="col-sm-2 col-form-label-lg">Pertahun </label>
                                            <div class="col-sm-10"  style="display: ">
                                                <select id="inpTahun" class="form-control form-control-lg" name="pertahun" id="">
                                                    <option value="" selected disabled>~Pilih Tahun~</option>
                                                    @for ($i = date('Y'); $i > 2015; $i--)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group row" id="perrentangwaktu" style="display:none;">
                                            <label class="col-sm-2 col-form-label-lg">Rentang Waktu </label>
                                            <div class="col-sm-10"  style="display: ">
                                               <div class="input-group input-group-lg mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tanggal Mulai</span>
                                                    </div>
                                                    <input  class="form-control" name="start" type=date id=start required>
                                                </div>
                                               <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Tanggal Berakhir</span>
                                                    </div>
                                                    <input class="form-control" name="end" type=date id=end required>
                                                </div>
                                            </div>
                                            
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary btn-submit">Filter</button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nama Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pencatatan_keuangan as $item)
                                                <tr style="color: black">
                                                    
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                                    <td>{{ $item->from_to }}</td>
                                                    <td style="text-transform:uppercase">{{ $item->tipe }}</td>
                                                    
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                   
                </div>
            </div>
    </div>
@endsection

@push('scriptPlus')
   <script>
        var JangkaWaktu = document.getElementById('jangkaWaktu');
        var Triwulan = document.getElementById('triwulan');
        var Perbulan = document.getElementById('perbulan');
        var Pertahun = document.getElementById('pertahun');
        var RentangWaktu = document.getElementById('perrentangwaktu');

        function onChangeJangkaWaktu(e){
            console.log('E', e);
            switch (e) {
                case 'triwulan':
                    Triwulan.style.display = "flex";
                    Perbulan.style.display = "none";
                    Pertahun.style.display = "none";
                    RentangWaktu.style.display = "none";
                    
                    break;
                case 'perbulan':
                    Perbulan.style.display = "flex";
                    Triwulan.style.display = "none";
                    Pertahun.style.display = "none";
                    RentangWaktu.style.display = "none";

                    break;
                case 'pertahun':
                    Pertahun.style.display = "flex";
                    Perbulan.style.display = "none";
                    Triwulan.style.display = "none";
                    RentangWaktu.style.display = "none";

                    break;
                case 'rentangWaktu':
                    RentangWaktu.style.display = "flex";
                    Pertahun.style.display = "none";
                    Perbulan.style.display = "none";
                    Triwulan.style.display = "none";
                    break;
                default:
                    break;
            }
        }
        var start = document.getElementById('start');
        var end = document.getElementById('end');

        start.addEventListener('change', function() {
            if (start.value)
                end.min = start.value;
        }, false);
        end.addEventLiseter('change', function() {
            if (end.value)
                start.max = end.value;
        }, false);
   </script>

   <script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
        var valJangkaWaktu = document.getElementById('jangkaWaktu').value;

        var triwulan = $("select[name=triwulan]").val();
        var perbulan = $("select[name=perbulan]").val();
        var pertahun = $("select[name=pertahun]").val();
        var start = $("input[name=start]").val();
        var end = $("input[name=end]").val();

        switch (valJangkaWaktu) {
            case 'triwulan':
                var tipe = valJangkaWaktu;
                var value = triwulan;
                break;

            case 'perbulan':
                var tipe = valJangkaWaktu;
                var value = perbulan;
                break;
            case 'pertahun':
                var tipe = valJangkaWaktu;
                var value = pertahun;
                break;
            case 'rentangWaktu':
                var tipe = valJangkaWaktu;
                var value = `${start}=${end}`;
                // var value = {
                //     start: start,
                //     end: end
                // };
                break;
            
            default:
                break;
        }
        var url = `/laporan/filter/${tipe}/${value}`;
        $.ajax({
           type:'GET',
           url:url,
        //    data:{tipe: tipe, value:value},
           success: function (data, status, xhr) {// success callback function
                        // console.log('DATA', data);
                        
                        // $('p').append(data);
                        var a = document.createElement("a");
                        a.download = "filename.xls";
                        a.href = url;
                        document.body.appendChild(a);
                        a.click();
                        location.href = `/laporan/filter/${tipe}/${value}`;

                }
        });
        
        function triggerExport(data){
                var url = `/laporan/filter/${tipe}/${value}`;

                // $.get(url);
                $.ajax(url,   // request url
                    {
                        url: url,
                        method: "POST",
                        success: function (data, status, xhr) {// success callback function
                            // $('p').append(data);
                            // window.location.href = url;
                            var a = document.createElement("a");
                            a.download = "filename.xls";
                            a.href = url;
                            document.body.appendChild(a);
                            a.click();
                            location.href = `/transaksi_laporan/${month}`;

                    }
                });
        }
  
    });
</script>
@endpush