@extends('layouts.adminapp')

@section('title', 'Semester')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <h4>Data Kelas</h4>
                    </div>
                    <div class="col-8">
                        <div class="text-right d-none d-lg-block">
                            <a href="{{ route('admin.semester.create') }}" class="btn btn-primary"><i class="align-middle mr-2" data-feather="plus-square"></i>Tambah Data</a>
                        </div>
                        <div class="text-right d-block d-lg-none">
                            <a href="{{ route('admin.semester.create') }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-4">
                <table class="table mb-0 table-hover" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">Tahun Pelajaran</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($semesters as $semester)
                        <tr>
                            <td>{{ $semester['tahun_pelajaran'] }}</td>
                            <td>{{ $semester['semester'] }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.semester.edit', $semester) }}"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a href="{{ route('admin.semester.delete', $semester) }}" class="dropdown-item" onclick="return Hapus();" ><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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