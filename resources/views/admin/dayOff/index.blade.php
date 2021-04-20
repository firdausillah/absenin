@extends('layouts.adminapp')

@section('title', 'Daftar Hari Libur')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-none d-lg-block">
                    <div class="row">
                        <div class="col-6">
                            <h4>Daftar Hari Libur</h4>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <a href="#" class="ml-2 btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Cari bulan</a>
                                <a href="{{ route('admin.dayOff.create') }}" class="ml-2 btn btn-primary"><i class="align-middle mr-2" data-feather="plus-square"></i>Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block d-lg-none">
                    <div class="row">
                        <div class="text-center col-12">
                            <h4>Daftar Hari Libur</h4>
                        </div>
                        <div class="text-center col-12">
                            <a href="#" class="ml-2 btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></a>
                            <a href="{{ route('admin.dayOff.create') }}" class="ml-2 btn btn-primary btn-sm"><i class="align-middle" data-feather="plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-4">
                <table class="table mb-0 table-hover" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dayOffs as $dayOff)
                        <tr>
                            <td>{{ date_format(new DateTime($dayOff['tanggal']), 'd F Y') }}</td>
                            <td>{{ $dayOff['keterangan'] }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.dayOff.edit', $dayOff) }}"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a class="dropdown-item" onclick='Hapus()' href="{{ route('admin.dayOff.delete', $dayOff) }}"><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Berdasarkan Bulan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.dayOff.search') }}" method="POST">
            @csrf
            <div class="form-group">
                <input class="form-control" type="month" name="bulan">
            </div>
            <div class="text-right mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end modal --}}
@endsection
@push('js')

    <script>
        function Hapus(){
            return confirm('Apakah anda yakin ingin menghapus data ini ?');
        }
    </script>
@endpush