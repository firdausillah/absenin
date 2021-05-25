@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit Data Guru')

@section('content')
<!-- Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data Siswa</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data.student.edit', $student) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputName4">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ $student->name }}" id="inputName4" placeholder="Nama Lengkap">
                            @error('name')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputInduk4">Nomor Induk</label>
                            <input type="number" name="induk" class="form-control" value="{{ $student->induk }}" id="inputInduk4" placeholder="Nomor Induk">
                            @error('induk')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputUsername">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $student->username }}" id="inputUsername" placeholder="Username">
                            @error('username')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4">Password</label>
                            <input type="password" name="password" disabled class="form-control" value="{{ $student->password }}" id="inputPassword4" placeholder="Password">
                            @error('name')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputTglLahir4">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $student->tgl_lahir }}" id="inputTglLahir4" placeholder="Tanggal Lahir">
                            @error('tgl_lahir')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputTelfon4">Nomor Telfon</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ $student->no_hp }}" id="inputTelfon4" placeholder="Nomor Telfon">
                            @error('no_hp')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAlamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $student->alamat }}" id="inputAlamat" placeholder="Alamat Lengkap">
                        @error('alamat')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputGambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control" value="{{ $student->gambar }}" id="inputGambar">
                            @error('gambar')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <a href="{{ asset('storage/'.$student->gambar) }}"> <img src="{{ asset('storage/'.$student->gambar) }}" height="100px" alt="{{ asset('storage/'.$student->gambar) }}"> </a>
                        </div>
                    </div>
                    {{-- <a href="#" type="submit" class="btn btn-primary">Submit</a> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="data-guru.php" class="btn btn-success">Kembali</a>
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