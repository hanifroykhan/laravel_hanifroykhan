@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Pasien</h2>
        <hr>
        <form action="{{ route('storePasien') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}">
                @error('nama_rs')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat_rs">Alamat</label>
                <textarea class="form-control @error('alamat_pasien') is-invalid @enderror" id="alamat_pasien" name="alamat_pasien">{{ old('alamat_pasien') }}</textarea>
                @error('alamat_pasien')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telpon_pasien">No.Telpon</label>
                <input type="text" class="form-control @error('telpon_pasien') is-invalid @enderror" id="telpon_pasien" name="telpon_pasien" value="{{ old('telpon_pasien') }}">
                @error('telpon_pasien')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rumah_sakit_id">Rumah Sakit :</label>
                <select id="rumah_sakit_id" name="rumah_sakit_id" class="form-control">
                    <option value="">All Hospitals</option>
                    @foreach ($rs as $rumah_sakit)
                        <option value="{{ $rumah_sakit->id }}">{{ $rumah_sakit->nama_rs }}</option>
                    @endforeach
                </select>
            </div>
             <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#rumah_sakit_id').change(function() {
            var rumahSakit = $(this).val();
            window.location.href = "{{ route('indexPasien') }}?rumah_sakit_id=" + rumahSakit;
        });
    });
</script>



