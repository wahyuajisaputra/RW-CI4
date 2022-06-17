@extends('layouts.main')

@section('container')
    <h1>Halaman Mahasiswa</h1>

    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Mahasiswa
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('simpan_mahasiswa') }}" method="POST">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nim" class="form-label">No Induk Mahasiswa</label>
                        <input type="text" class="form-control" id="nim" placeholder="G.231.19.0001">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div> --}}

    {{-- <button type="button" class="btn btn-primary">Tambah Data Mahasiswa</button> --}}
    <a href="/tambah_data_mahasiswa" class="btn btn-primary">Tambah Data Mahasiswa</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NIM</th>
            <th scope="col">NAMA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
          </tr>
        </tbody>
      </table>
@endsection