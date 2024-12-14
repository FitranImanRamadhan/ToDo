@extends('adminlayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <form id="updateForm" method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}" required autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-2">
                            <label for="hak_akses" class="col-md-4 col-form-label text-md-right">Hak_akses<span class="text-danger">*</span></label>

                            <div class="col-md-6">
                                <select id="hak_akses" class="form-control @error('hak_akses') is-invalid @enderror" name="hak_akses" required>
                                    <option value="" disabled>Select Hak_akses</option>
                                    <option value="Admin" {{ $user->hak_akses == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="User" {{ $user->hak_akses == 'User' ? 'selected' : '' }}>User</option>
                                    <option value="Pimpinan" {{ $user->hak_akses == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                                </select>

                                @error('hak_akses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="updateBtn" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
