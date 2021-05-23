@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Buat Semester')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data Semester</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.semester.create') }}" method="POST">
                    @csrf
                    @include('admin.semester.partials.form-control')
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