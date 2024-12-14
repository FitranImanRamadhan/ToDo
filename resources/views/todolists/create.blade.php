@extends('adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Todo</div>

                    <div class="card-body">
                        <form action="{{ route('todolists.store') }}" method="POST">
                            @csrf
                        
                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">Nama<span class="text-danger">*</span></label>
                        
                                <div class="col-md-8">
                                    <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>
                                        <option value="" disabled selected>Pilih Nama</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->id }}" {{ old('user_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option> <!-- Menggunakan id pengguna -->
                                        @endforeach
                                    </select>
                        
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row mt-2">
                                <label for="todo" class="col-md-4 col-form-label text-md-right">Todo<span class="text-danger">*</span></label>
                        
                                <div class="col-md-8">
                                    <textarea name="todo" id="todo" class="form-control @error('todo') is-invalid @enderror" required>{{ old('todo') }}</textarea>
                        
                                    @error('todo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row mt-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        Save
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
