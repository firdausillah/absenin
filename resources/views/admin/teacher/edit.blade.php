@extends('layouts.adminapp')

@push('css')
    <!-- Custom styles for this page -->
@endpush

@section('title', 'Edit Data Guru')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    @php
        dd($teacher);
    @endphp
</div>
<!-- end Content -->
@endsection
@push('js')
    <!-- Page level plugins -->
@endpush