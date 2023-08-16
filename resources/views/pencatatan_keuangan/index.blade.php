@extends('partials.layout')

@section('title', 'Pengeluaran')

@section('content')
    <div class="content-body">
            <div class="container-fluid">
                <x-alert></x-alert>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data Pengeluaran</h4>
                                {{-- <a href="{{ route('pencatatan-keuangan.create') }}" class="btn btn-rounded btn-success">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                                </a> --}}
                            </div>
                            {{-- <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                </button>
                                <strong>Success!</strong> Message has been sent.
                            </div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pendapatan/Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                                {{-- <th>Opsi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pencatatan_keuangan as $item)
                                                <tr style="color: black">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jumlah }}</td>
                                                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                                    <td>{{ $item->from_to }}</td>
                                                    <td style="text-transform:uppercase">
                                                        <span class="badge badge-lg {{ $item->tipe=='pemasukkan' ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $item->tipe }}
                                                        </span>
                                                    
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
                                                <th>No</th>
                                                <th>Nama Pendapatan/Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Tipe</th>
                                                {{-- <th>Opsi</th> --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
    </div>
@endsection