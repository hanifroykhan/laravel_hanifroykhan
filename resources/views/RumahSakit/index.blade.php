@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Rumah Sakit</h2>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('createRS') }}" class="btn btn-success mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Rumah Sakit</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rumahSakit as $rs)
                    <tr>
                        <td>{{ $rs->id }}</td>
                        <td>{{ $rs->nama_rs }}</td>
                        <td>{{ $rs->alamat_rs }}</td>
                        <td>{{ $rs->email_rs }}</td>
                        <td>{{ $rs->telpon_rs }}</td>
                        <td>
                            
                            <form id="delete-form-{{ $rs->id }}" action="{{ route('deleteRS', $rs->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <script>
                                    $(document).ready(function() {
                                        $('#delete-btn-{{ $rs->id }}').click(function(event) {
                                            event.preventDefault();
                                            if (confirm("Are you sure?")) {
                                                $('#delete-form-{{ $rs->id }}').submit();
                                            }
                                        });
                                    });
                                </script>
                                <a href="{{ route('editRS', $rs->id) }}" class="btn btn-warning">Edit</a>
                                <button id="delete-btn-{{ $rs->id }}" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection