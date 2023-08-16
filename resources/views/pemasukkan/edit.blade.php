@extends('partials.layout')

@section('title', 'Tambah Pendapatan')
@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Pendapatan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('data-pemasukkan.update', $pemasukkan->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Nama Pendapatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" value="{{ old('nama', $pemasukkan->nama) }}" class="form-control form-control-lg" placeholder="Nama Pendapatan">
                                            </div>
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Kategori Pendapatan</label>
                                            <div class="col-sm-10">
                                                <select name="id_kategori" id="dynamic-option-creation" class="form-control form-control-lg">
                                                    @if ($pemasukkan->id_kategori == '')
                                                        <option selected disabled>~Pilih kategori~</option>
                                                    @endif
                                                    @foreach ($kategori as $item)
                                                        <option value="{{ $item->id }}" @if ($item->id == old('id_kategori', $pemasukkan->id_kategori))
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
                                            <label class="col-sm-2 col-form-label-lg">Jumlah Pendapatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jumlah" value="{{ old('jumlah', $pemasukkan->jumlah) }}" class="form-control form-control-lg" placeholder="50000, 15000, 20000"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                            @error('jumlah')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Tanggal Pendapatan</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="tgl" value="{{ old('tgl', $pemasukkan->tgl) }}" class="form-control form-control-lg" >
                                            </div>
                                            @error('tgl')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Penanggung Jawab</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_to" value="{{ old('from_to', $pemasukkan->from_to) }}" class="form-control form-control-lg" placeholder="Penanggung jawab...">
                                            </div>
                                            @error('from_to')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="col-form-label-lg">Keterangan</label>
                                            <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" name="keterangan" rows="3">{{ old('keterangan', $pemasukkan->keterangan) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="col-form-label-lg">Gambar Pendapatan</label>

                                            <div class="input-group mb-3" id="fileInput" hidden >
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bukti Pendapatan</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input name="gbr" type="file" class="custom-file-input" id="inputGambar" accept=".jpg, .jpeg">
                                                    <label id="lblInputGambar" class="custom-file-label" for="inputGambar">Pilih gambar</label>
                                                </div>
                                            </div>
                                            <div class="">
                                                <button hidden id="btnNdaJadi" onclick="gantiButtonNdaJadi()" type="button"  class="btn btn-danger px-2 mb-2" download="berkas_kerjasama">
                                                <i class="bx bx-x "></i>
                                                Tidak jadi
                                                </button>

                                                <button  id="btnGanti" onclick="gantiButton()" type="button"  class="btn btn-warning px-2 mb-2" download="berkas_kerjasama">
                                                <i class="bx bx-edit me-1"></i>
                                                Ganti Bukti Pendapatan
                                                </button>
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

    <script>
        function gantiButton() {
          document.getElementById("btnNdaJadi").hidden = false;
          document.getElementById("btnGanti").hidden = true;
          document.getElementById("fileInput").hidden = false;
        }

        function gantiButtonNdaJadi() {
          document.getElementById("btnNdaJadi").hidden = true;
          document.getElementById("btnGanti").hidden = false;
          document.getElementById("fileInput").hidden = true;
        }
    </script>
@endpush