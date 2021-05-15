@extends('layouts.adminapp')

@section('title', 'Data Guru')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <h4>Data Siswa</h4>
                    </div>
                    <div class="col-8">
                        <div class="text-right d-none d-lg-block">
                            <a href="#" class="btn btn-success"><i class="align-middle mr-2" data-feather="printer"></i>Print</a>
                        </div>
                        <div class="text-right d-block d-lg-none">
                            <a href="#" class="btn btn-success btn-sm"><i class="align-middle" data-feather="printer"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-4">
                <table class="table mb-0" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Username</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td><a href="data-siswa-detail.php" style="color:#495057">{{ $student->name }}</a></td>
                            <td><img src="{{ asset('storage/'.$student->gambar) }}" height="70px" alt="{{ asset('storage/'.$student->gambar) }}"></td>
                            <td>X Multimedia</td>
                            <td>{{ $student->username }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="data-siswa-detail.php"><i class="align-middle mr-2" data-feather="eye"></i> Detail</a>
                                    <a class="dropdown-item" href="data-siswa-form.php"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a class="dropdown-item" onclick='Hapus()' href="#"><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
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