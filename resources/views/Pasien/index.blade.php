@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pasien</h2>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('createPasien') }}" class="btn btn-success mb-3">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pasien</th>
                    <th>Alamat Pasien</th>
                    <th>Nomor Telpon Pasien</th>
                    <th>Rumah Sakit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasien as $pasiens)
                    <tr>
                        <td>{{ $pasiens->id }}</td>
                        <td>{{ $pasiens->nama_pasien }}</td>
                        <td>{{ $pasiens->alamat_pasien }}</td>
                        <td>{{ $pasiens->telpon_pasien }}</td>
                        <td>{{ $pasiens->rumah_sakit->nama_rs }}</td>
                        <td>
                            
                            <form id="delete-form-{{ $pasiens->id }}" action="{{ route('deletePasien', $pasiens->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <script>
                                    $(document).ready(function() {
                                        $('#delete-btn-{{ $pasiens->id }}').click(function(event) {
                                            event.preventDefault();
                                            if (confirm("Are you sure?")) {
                                                $('#delete-form-{{ $pasiens->id }}').submit();
                                            }
                                        });
                                    });
                                </script>
                                <a href="{{ route('editPasien', $pasiens->id) }}" class="btn btn-warning">Edit</a>
                                <button id="delete-btn-{{ $pasiens->id }}" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection