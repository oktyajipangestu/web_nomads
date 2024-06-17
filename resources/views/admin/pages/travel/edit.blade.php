@extends('admin.layout.index')

@section('content')
    <div class="container">
        <h2 class="font-bold">Tambah Travel</h2>
        <hr>
        <form action="{{ route('travel.update', $travel->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="form-group first-form">
                <label for="name">Nama Tempat Wisata</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{ old('name') ?? $travel->name }}">
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="country">Negara</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Negara" value="{{ old('country') ?? $travel->country }}">
                @error('country')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Alamat" value="{{ old('address') ?? $travel->address }}">
              </div>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" rows="5" name="description">{{ old('description') ?? $travel->description }}</textarea>
            </div>
            <img class="mb-3" width="300px" src="{{ Storage::url($travel->thumbnail) }}" alt="">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="file">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection