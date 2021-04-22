@extends('layouts.adminapp')

@section('title', 'Jadwal Pelajaran')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data Sekolah</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data.sekolah.update', $school) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputName4">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') ?? $school->nama_sekolah }}" class="form-control" id="inputName4" placeholder="Nama Sekolah">
                        @error('nama_sekolah')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputNomorInduk4">Nomor Induk</label>
                            <input type="text" name="nomor_induk" value="{{ old('nomor_induk') ?? $school->nomor_induk }}" class="form-control" id="inputNomorInduk4" placeholder="Nomor Induk">
                        @error('nomor_induk')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputKepalaSekolah">Kepala Sekolah</label>
                            <input type="text" name="kepala_sekolah" value="{{ old('kepala_sekolah') ?? $school->kepala_sekolah }}" class="form-control" id="inputKepalaSekolah" placeholder="Kepala Sekolah">
                        @error('kepala_sekolah')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputNIP">NIP Kepala Sekolah</label>
                            <input type="text" name="nip_kepala" value="{{ old('nip_kepala') ?? $school->nip_kepala }}" class="form-control" id="inputNIP" placeholder="NIP Kepala Sekolah">
                        @error('nip_kepala')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAlamat">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat') ?? $school->alamat }}" class="form-control" id="inputAlamat" placeholder="Alamat Lengkap">
                    @error('alamat')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="inputLogo">Logo</label>
                            <input type="file" name="logo" class="form-control" id="inputLogo">
                        @error('logo')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <a href="{{ asset('storage/'.$school->logo) }}"><img src="{{ asset('storage/'.$school->logo) }}" alt="" height="90px"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor Telfon</label>
                            <input type="text" name="nomor_telfon" value="{{ old('nomor_telfon') ?? $school->nomor_telfon }}" class="form-control" placeholder="Nomor Telfon">
                        @error('nomor_telfon')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">E-Mail</label>
                            <input type="text" name="email" value="{{ old('email') ?? $school->email }}" class="form-control" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" value="{{ old('website') ?? $school->website }}" class="form-control" placeholder="Website">
                    </div>
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Content -->
@endsection
@push('js')

    <script>
        function Hapus(){
            return confirm('Apakah anda yakin ingin menghapus data ini ?');
        }
    </script>
@endpush