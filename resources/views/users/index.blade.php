@extends('adminlayout')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-between mb-2">
    <div class="text-end">

    </div>
    <div class="text-end">
        <a class="btn btn-success" style="margin-top: 20px;" href="{{ route('users.create') }}">Add User</a>
    </div>
</div>

<table id="data" class="table table-striped table-responsive table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Level</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach ($users as $data)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->hak_akses}}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('users.edit', $data->id) }}">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $data->id }}">Delete</button>

                <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Kofirmasi Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <form id="delete-form-{{ $data->id }}" action="{{ route('users.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="deleteUser({{ $data->id }})">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('js')

<script>
    $(document).ready(function() {
        $('#data').DataTable();
    });

    function deleteUser(id) {
        document.getElementById('delete-form-' + id).submit();
    }
</script>
@endsection