@extends('layouts.adminapp')

@section('title', 'Update jam Absen Guru')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Jam Absen Siswa</strong></h5>
            </div>
            <div class="card-body">
                @if ($level == 'guru')
                    <form action="{{ route('admin.hour.guru.edit', $hour) }}" method="POST">
                @else
                    <form action="{{ route('admin.hour.siswa.edit', $hour) }}" method="POST">
                @endif
                    @csrf
                    @method('put')
                    @include('admin.hour.partials.form-control')
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end Content -->
@endsection
@push('js')
@endpush