@extends('adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Todo</div>

                    <div class="card-body">
                        <form action="{{ route('todolists.update', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama<span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <select id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" required>
                                        <option value="" disabled>Pilih Nama</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->nama }}" {{ $todo->nama == $item->nama ? 'selected' : '' }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-2">
                                <label for="todo" class="col-md-4 col-form-label text-md-right">Todo<span class="text-danger">*</span></label>

                                <div class="col-md-8">
                                    <textarea name="todo" id="todo" class="form-control @error('todo') is-invalid @enderror" required>{{ $todo->todo }}</textarea>

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
