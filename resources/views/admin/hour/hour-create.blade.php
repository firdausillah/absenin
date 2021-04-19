@extends('layouts.adminapp')

@section('title', 'Form Jam Absen')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Jam Absen {{ $level }} </strong></h5>
            </div>
            <div class="card-body">
                @if ($level == 'guru')
                    <form action="{{ route('admin.hour.guru.create') }}" method="POST">
                @else
                    <form action="{{ route('admin.hour.siswa.create') }}" method="POST">
                @endif
                    @csrf
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