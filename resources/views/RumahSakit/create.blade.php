@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Rumah Sakit</h2>
        <hr>
        <form action="{{ route('storeRS') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_rs">Nama Rumah Sakit</label>
                <input type="text" class="form-control @error('nama_rs') is-invalid @enderror" id="nama_rs" name="nama_rs" value="{{ old('nama_rs') }}">
                @error('nama_rs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_rs">Alamat</label>
                <textarea class="form-control @error('alamat_rs') is-invalid @enderror" id="alamat_rs" name="alamat_rs">{{ old('alamat_rs') }}</textarea>
                @error('alamat_rs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email_rs">Email</label>
                <input type="email" class="form-control @error('email_rs') is-invalid @enderror" id="email_rs" name="email_rs" value="{{ old('email_rs') }}">
                @error('email_rs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon_rs">No.Telpon</label>
                <input type="text" class="form-control @error('telpon_rs') is-invalid @enderror" id="telpon_rs" name="telpon_rs" value="{{ old('telpon_rs') }}">
                @error('telpon_rs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
             <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
