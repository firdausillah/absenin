@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit Daftar Hari Libur')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Daftar Hari Libur</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dayOff.edit', $dayOff) }}" method="POST">
                    @csrf
                    @method('put')
                    @include('admin.dayOff.partials.form-control')
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