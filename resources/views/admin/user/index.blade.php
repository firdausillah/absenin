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
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#importExcel"><i class="align-middle mr-2" data-feather="upload"></i>Import</a>
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="align-middle mr-2" data-feather="plus-square"></i>Tambah Data</a>
                            <a href="#" class="btn btn-danger" id="deleteAll"><i class="align-middle mr-2" data-feather="delete"></i>Hapus</a>
                        </div>
                        <div class="text-right d-block d-lg-none">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importExcel"><i class="align-middle" data-feather="upload"></i></a>
                            <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm"><i class="align-middle" data-feather="plus-square"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" id="deleteAll"><i class="align-middle" data-feather="delete"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive m-4">
                <table class="table mb-0 table-hover" id="example1">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="checkAll" class="form-check-input"></th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr id="cid{{ $user['id'] }}">
                            <th><input type="checkbox" name="checkid" value="{{ $user['id'] }}" class="form-check-input checkBoxClass"></th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['username'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>
                                <div class="form-check form-switch text-center">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $user['status'] == '1' ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('admin.data.user.edit', $user) }}"><i class="align-middle mr-2" data-feather="edit"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('admin.data.user.delete', $user) }}"><i class="align-middle mr-2" data-feather="delete"></i> Hapus</a>
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

{{-- modal open --}}
	<!-- Import Excel -->
	<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<form method="post" action="{{ route('admin.data.user.import') }}" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
					</div>
					<div class="modal-body">
 
						{{ csrf_field() }}
 
						<label>Pilih file excel</label>
						<div class="form-group">
							<input type="file" name="file" required="required">
						</div>
 
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Import</button>
					</div>
				</div>
			</form>
		</div>
	</div>
{{-- modal close --}}
@endsection
@push('js')

    <script>
        $(function(e){
            $("#checkAll").click(function(){
                $('.checkBoxClass').prop('checked',$(this).prop('checked'))
            });

            $('#deleteAll').click(function(e){
                e.preventDefault();
                var allids = [];
                $("input:checkbox[name=ids]:checked").each(function(){
                    allids.push($(this).val());
                });

                $.ajax({
                    url:"{{ route('admin.data.user.delete.all') }}",
                    type:'DELETE',
                    data:{
                        ids:allids,
                        _token:$("input[name=_token]").val()
                    },
                    success:function(response){
                        $each(allids,function(key,val){
                            $('#cid'+val).remove();
                        })
                    }
                })
            });
        });
    </script>

    <script>
        function Hapus(){
            return confirm('Apakah anda yakin ingin menghapus data ini ?');
        }
    </script>
@endpush