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
                <form>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputName4">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control" id="inputName4" placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputNomorInduk4">Nomor Induk</label>
                            <input type="text" name="induk" value="{{ $teacher->induk }}" class="form-control" id="inputNomorInduk4" placeholder="Nomor Induk">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputUsername">Username</label>
                            <input type="text" name="username" value="{{ $teacher->username }}" class="form-control" id="inputUsername" placeholder="Username">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputPassword4">Password</label>
                            <input type="password" name="password" value="{{ Crypt::decrypt($teacher->password) }}" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputMapel4">Mata Pelajaran</label>
                            <input type="text" name="mapel" value="{{ $teacher->mapel }}" class="form-control" id="inputMapel4" placeholder="Pisahkan dengan koma ex. Matematika, Seni Budaya">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputTelfon4">Nomor Telfon</label>
                            <input type="text" name="telfon" value="{{ $teacher->telfon }}" class="form-control" id="inputTelfon4" placeholder="Nomor Telfon">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAlamat">Alamat</label>
                        <input type="text" name="alamat" value="{{ $teacher->alamat }}" class="form-control" id="inputAlamat" placeholder="Alamat Lengkap">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputGambar">Gambar</label>
                            <input type="file" name="gambar" value="{{ $teacher->gambar }}" class="form-control" id="inputGambar">
                        </div>
                        <div class="mb-3 col-md-6">
                        </div>
                    </div>
                    <a href="#" type="submit" class="btn btn-primary">Submit</a>
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