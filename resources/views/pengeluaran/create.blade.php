@extends('partials.layout')

@section('title', 'Tambah Pengeluaran')
@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Pengeluaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('data-pengeluaran.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Nama Pengeluaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control form-control-lg" placeholder="Nama Pengeluaran">
                                            </div>
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Kategori Pengeluaran</label>
                                            <div class="col-sm-10">
                                                <select name="id_kategori" id="dynamic-option-creation" class="form-control form-control-lg">
                                                    <option selected disabled>~Pilih kategori~</option>
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}" @if ($item->id == old('id_kategori'))
                                                           selected 
                                                        @endif>{{ $item->nama }}</option>
                                                    @endforeach
                                                    {{-- @empty
                                                        <option disabled></option>
                                                        
                                                    @endforelse --}}
                                                </select>
                                            </div>
                                            @error('id_kategori')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Jumlah Pengeluaran</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jumlah" value="{{ old('jumlah') }}" class="form-control form-control-lg" placeholder="50000, 15000, 20000"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            @error('jumlah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Tanggal Pengeluaran</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl" value="{{ old('tgl') }}" class="form-control form-control-lg" >
                                            </div>
                                            @error('tgl')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Penanggung Jawab</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_to" value="{{ old('from_to') }}" class="form-control form-control-lg" placeholder="Penanggung jawab...">
                                            </div>
                                            @error('from_to')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- {{ dd(Auth::user()->tipe) }} --}}
                                        @if (Auth::user()->tipe === 'superadmin')
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label-lg">Tipe Status</label>
                                                <div class="col-sm-10">
                                                    <select name="status"  class="form-control form-control-lg">
                                                        <option selected disabled>~Pilih Tipe~</option>
                                                        <option value="pending" @if (old('status') == 'pending')
                                                            selected
                                                        @endif>Pending</option>
                                                        <option value="diterima" @if (old('status') == 'diterima')
                                                            selected
                                                        @endif>Diterima</option>
                                                        <option value="ditolak" @if (old('status') == 'ditolak')
                                                            selected
                                                        @endif>Ditolak</option>
                                                        
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Keterangan</label>
                                            <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bukti Pengeluaran</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input name="gbr" type="file" class="custom-file-input" id="inputGambar" accept=".jpg, .jpeg">
                                                    <label id="lblInputGambar" class="custom-file-label" for="inputGambar">Pilih gambar</label>
                                                </div>
                                            </div>
                                            @error('gbr')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        

                                        <input type="hidden" name="tipe" value="pengeluaran">
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
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
        $(document).ready(function(){
            $('#inputGambar').change(function(e){
                var fileName = e.target.files[0].name;
                let lblInputGambar = $("#lblInputGambar");

                lblInputGambar.text(fileName);

                // alert('The file "' + fileName +  '" has been selected.');
            });
        });

    </script>
@endpush