@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit Wali Kelas')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data Wali Kelas</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.homeroom.edit', $homeroom) }}" method="POST">
                    @csrf
                    @method('put')
                    @include('admin.homeroom.partials.form-control')
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