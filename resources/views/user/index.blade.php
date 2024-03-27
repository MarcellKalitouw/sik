@extends('partials.layout')

@section('title', 'User')

@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->
                <x-alert></x-alert>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data User </h4>
                                <a href="{{ route('user.create') }}" class="btn btn-rounded btn-success">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User  </th>
                                                <th>Tipe User  </th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user as $item)
                                                <tr style="color: black">
                                                    
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $item->name}}</td>
                                                    <td>{{ $item->tipe}}</td>
                                                    <td>
                                                      <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-rounded btn-warning">
                                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  
                                                        </a>
                                                        <a href="{{ asset('user/'.$item->gambar) }}" target="_blank" class="btn btn-rounded btn-info">
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
                                                <th>Nama User</th>
                                                <th>Tipe User</th>
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