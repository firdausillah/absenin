@extends('layouts.adminapp')

@section('title', 'Wali Kelas')

@section('content')
<!-- Content -->
<div class="row">
    {{-- @php
        dd($homerooms)
    @endphp --}}
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-8 d-none d-lg-block">
                        <h4>Data Wali Kelas Semester <b> <?= $smst->semester ?> </b> Tahun Pelajaran <b> <?= $smst->tahun_pelajaran?> </b> </h4>
                    </div>
                    <div class="col-4">
                        <div class="text-right d-none d-lg-block">
                            <a href="#" class="ml-2 btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i> Cari Semester</a>
                            <a href="{{ route('admin.homeroom.create') }}" class="btn btn-primary"><i class="align-middle mr-2" data-feather="plus-square"></i>Tambah Data</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center d-block d-lg-none">
                        <h4>Data Wali Kelas Semester <b> <?= $smst->semester ?> </b> Tahun Pelajaran <b> <?= $smst->tahun_pelajaran?> </b> </h4>
                    </div>
                    <div class="text-center d-block d-lg-none">
                        <a href="#" class="ml-2 btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i></a>
                        <a href="{{ route('admin.homeroom.create') }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="plus-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table mb-0 table-hover" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            dd($humrum)
                        @endphp --}}
                        @foreach($homerooms as $homeroom)
                        <tr>
                            <td>{{ $homeroom['nama'] }}</td>
                            <td>{{ $homeroom['kelas'] }}</td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.homeroom.edit', $homeroom['id']) }}"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a href="{{ route('admin.homeroom.delete', $homeroom['id']) }}" class="dropdown-item" onclick="return Hapus();" ><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
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
        <form action="{{ route('admin.homeroom.search') }}" method="POST">
            @csrf
            <div class="form-group">
                <select name="semester_id" class="form-control">
                    @foreach ($smstrs as $semester)
                    <option value="<?= $semester->id ?>" <?= $semester->id == $smst->id ? ' selected' : '' ?> ><?= $semester->semester.' tahun pelajaran '.$semester->tahun_pelajaran ?></option>
                    @endforeach
                </select>
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