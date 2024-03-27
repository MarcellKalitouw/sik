@extends('partials.layout')

@section('title', 'Tambah Kategori')
@section('content')
    <div class="content-body">
            <div class="container-fluid">
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Nama User</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control form-control-lg" placeholder="Nama User">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label-lg">Tipe Admin</label>
                                            <div class="col-sm-10">
                                                <select name="tipe"  class="form-control form-control-lg">
                                                    <option selected disabled>~Pilih Tipe~</option>
                                                    <option value="admin" @if ($user->tipe == 'admin')
                                                        selected
                                                    @endif>Admin</option>
                                                    <option value="superadmin" @if ($user->tipe == 'superadmin')
                                                        selected
                                                    @endif>Super Admin</option>
                                                    
                                                </select>
                                            </div>
                                            @error('tipe')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
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
