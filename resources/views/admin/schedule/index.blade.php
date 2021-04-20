@extends('layouts.adminapp')

@section('title', 'Jadwal Pelajaran')

@section('content')
<!-- Content -->
<div class="row">
    @include('alert')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><strong>Form Jadwal Pelajaran</strong></h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.schedule.update', $schedule) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Tahun Pelajaran</label>
                        <input type="text" name="tahun_pelajaran" class="form-control" value="{{ old('tahun_pelajaran') ?? $schedule->tahun_pelajaran }}" placeholder="Tahun Pelajaran">
                        @error('tahun_pelajaran')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jadwal Pelajaran (PDF)</label>
                        <input type="file" accept="application/pdf" name="jadwal_pelajaran" class="form-control">
                        @error('jadwal_pelajaran')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <embed src = "{{ asset('storage/'.$schedule->jadwal_pelajaran) }}"  width = "100%" height = "600px" />
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