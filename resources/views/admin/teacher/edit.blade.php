@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit Data Guru')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data Guru</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data.teacher.edit', $teacher) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputName4">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" id="inputName4" placeholder="Nama Lengkap">
                            @error('name')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputNomorInduk4">Nomor Induk</label>
                            <input type="number" name="induk" value="{{ $teacher->induk }}" class="form-control" id="inputNomorInduk4" placeholder="Nomor Induk">
                            @error('induk')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputUsername">Username</label>
                            <input type="text" name="username" value="{{ $teacher->username }}" class="form-control" id="inputUsername" placeholder="Username">
                            @error('username')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4">Password</label>
                            <input type="password" disabled name="password" value="{{ $teacher->password }}" class="form-control" id="inputPassword4" placeholder="Password">
                            @error('password')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputMapel4">Mata Pelajaran</label>
                            <input type="text" name="mapel" value="{{ $teacher->mapel }}" class="form-control" id="inputMapel4" placeholder="Pisahkan dengan koma ex. Matematika, Seni Budaya">
                            @error('mapel')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputTelfon4">Nomor Telpon</label>
                            <input type="number" name="no_hp" value="{{ $teacher->no_hp }}" class="form-control" id="inputTelfon4" placeholder="Nomor Telfon">
                            @error('no_hp')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAlamat">Alamat</label>
                        <input type="text" name="alamat" value="{{ $teacher->alamat }}" class="form-control" id="inputAlamat" placeholder="Alamat Lengkap">
                        @error('alamat')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputGambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control" id="inputGambar">
                            @error('gambar')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <a href="{{ asset('storage/'.$teacher->gambar) }}"> <img src="{{ asset('storage/'.$teacher->gambar) }}" height="100px" alt="{{ asset('storage/'.$teacher->gambar) }}"> </a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.data.guru') }}" class="btn btn-success">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Content -->
@endsection
@push('js')
    <!-- Page level plugins -->
@endpush