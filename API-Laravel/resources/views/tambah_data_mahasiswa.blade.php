@extends('layouts.main')

@section('container')
    <center><h1>Form Tambah Mahasiswa</h1></center>
    <form>
        <div class="mb-3">
          <label for="nim" class="form-label">NO INDUK MAHASISWA</label>
          <input type="text" class="form-control" id="nim" aria-describedby="nim">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">NAMA LENGKAP</label>
            <input type="text" class="form-control" id="nama" aria-describedby="nama">
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
@endsection