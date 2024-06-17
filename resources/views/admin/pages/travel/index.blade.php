@extends('admin.layout.index')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h3>Daftar Travel</h3>
            <div>
                <a class="btn btn-info" href="{{ route('admin.travel.create') }}">+ Tambah</a>
            </div>
        </div>
        <hr>
        <div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Wisata</th>
                                <th>Negara</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection