@extends('partials.layout')

@section('title', 'Pengeluaran')

@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->
                <x-alert></x-alert>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data Pengeluaran</h4>
                                <a href="{{ route('data-pengeluaran.create') }}" class="btn btn-rounded btn-success">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengeluaran</th>
                                                <th>Tanggal</th>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                @if (Auth::user()->tipe == 'superadmin')
                                                    
                                                <th>Status</th>
                                                @endif
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($pengeluaran as $item)
                                                <tr style="color: black">
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ date_format( new DateTime($item->tgl), 'd M Y ')  }}</td>
                                                    <td style="text-transform: uppercase">
                                                        <span class="badge badge-primary">
                                                            {{ $item->kategori }}
                                                        </span>
                                                    </td>
                                                    <td>Rp.{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                    <td>{{ $item->keterangan ? $item->keterangan : '-' }}</td>
                                                    <td>{{ $item->from_to }}</td>
                                                    <td>{{ $item->status }} </td>
                                                    <td>
                                                      <form action="{{ route('data-pengeluaran.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('data-pengeluaran.edit', $item->id) }}" class="btn btn-rounded btn-warning">
                                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
                                                        </a>
                                                        <a href="{{ asset('pengeluaran/'.$item->gambar) }}" target="_blank" class="btn btn-rounded btn-info">
                                                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                        </a>
                                                        <button type="submit" class="btn btn-rounded btn-danger">
                                                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </button>

                                                      </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                
                                            @endforelse
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pengeluaran</th>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Penanggung Jawab</th>
                                                <th>Opsi</th>
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