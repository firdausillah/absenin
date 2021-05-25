@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Detail Data Guru '.$teacher->name)

@section('content')
<!-- Content -->
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ asset('storage/'.$teacher->gambar) }}" alt="{{ $teacher->name }}" width="90" height="90" class="rounded-circle mb-2" width="128" height="128">
                <h5 class="card-title mb-0">{{ $teacher->name }}</h5>
                <div class="text-muted">{{ $teacher->induk }}</div>
                <div class="card-title mb-0">{{ $teacher->nama_kelas }}</div>

            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Mata Pelajaran</h5>
                @php
                    $mapels = explode(",", $teacher->mapel);
                @endphp
                @foreach ($mapels as $mapel)
                    <a href="#" class="badge bg-primary me-1 my-1">{{ $mapel }}</a>
                @endforeach
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Contact</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1">
                        <span><i class="fas fa-phone"></i> Telpon <a href="#">{{ $teacher->no_hp }}</a></span>
                    </li>
                    <li class="mb-1">
                        <span><i class="fas fa-home"></i> Alamat <a href="#">{{ $teacher->alamat }}</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-xl-9">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Aktivitas <strong>Absenin</strong> {{ $teacher->name }}</h5>
            </div>
            <div class="card-body h-100">
                {{-- belum selesai --}}
                <div class="d-flex align-items-start">
                    <img src="{{ asset('storage/'.$teacher->gambar) }}" width="36" height="36" class="rounded-circle me-2 mr-2" alt="{{ $teacher->name }}">
                    <div class="flex-grow-1">
                        <strong>{{ $teacher->name }}</strong> telah absen pada <strong>Senin, 06 Maret 2021 jam 11.00</strong><br>
                        <small class="float-end text-navy">5 menit lalu</small>
                    </div>
                </div>
                <hr>

                <div class="d-flex align-items-start">
                    <img src="{{ asset('storage/'.$teacher->gambar) }}" width="36" height="36" class="rounded-circle me-2 mr-2" alt="{{ $teacher->name }}">
                    <div class="flex-grow-1">
                        <strong>{{ $teacher->name }}</strong> telah absen pada <strong>Senin, 06 Maret 2021 jam 11.00</strong><br>
                        <small class="float-end text-navy">5 menit lalu</small>
                    </div>
                </div>
                <hr>

                <div class="d-grid">
                    <a href="#" class="btn btn-primary">Load more</a>
                    <a href="{{ route('admin.data.guru') }}" class="btn btn-success">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end Content -->
@endsection
@push('js')
    <!-- Page level plugins -->
@endpush