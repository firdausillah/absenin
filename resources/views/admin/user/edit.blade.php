@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit User')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Data User</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data.user.edit', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    @include('admin.user.partials.form-control')
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