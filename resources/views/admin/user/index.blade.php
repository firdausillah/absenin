@extends('layouts.adminapp')

@section('title', 'Data User')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <h4>Data User</h4>
                    </div>
                    <div class="col-8">
                        <div class="text-right d-none d-lg-block">
                            <a href="#" class="btn btn-success"><i class="align-middle mr-2" data-feather="upload"></i>Import</a>
                            <a href="data-user-form.php" class="btn btn-primary"><i class="align-middle mr-2" data-feather="plus-square"></i>Tambah Data</a>
                            <a href="#" class="btn btn-danger" onclick='Hapus()'><i class="align-middle mr-2" data-feather="delete"></i>Hapus</a>
                        </div>
                        <div class="text-right d-block d-lg-none">
                            <a href="#" class="btn btn-success btn-sm"><i class="align-middle" data-feather="upload"></i></a>
                            <a href="data-user-form.php" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="plus-square"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" onclick='Hapus()'><i class="align-middle" data-feather="delete"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-4">
                <table class="table mb-0 table-hover" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th><input type="checkbox" name="checked[]" class="form-check-input"></th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['status'] == '1' ? 'Aktif' : 'Nonaktif' }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="data-user-form.php"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
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