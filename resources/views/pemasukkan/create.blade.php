@extends('partials.layout')

@section('title', 'Tambah Pemasukkan')
@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Pemasukkan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('data-pemasukkan.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Nama Pemasukkan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control form-control-lg" placeholder="Nama Pemasukkan">
                                            </div>
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Jumlah Pemasukkan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jumlah" value="{{ old('jumlah') }}" class="form-control form-control-lg" placeholder="50000, 15000, 20000"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            @error('jumlah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Tanggal Pemasukkan</label>
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
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Keterangan</label>
                                            <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bukti Pemasukkan</span>
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
                                        

                                        <input type="hidden" name="tipe" value="pemasukkan">
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