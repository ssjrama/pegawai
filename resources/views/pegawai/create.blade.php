@extends('layouts.admin')
@section('content')    
<main class="dash-content">
    <div class="container-fluid">
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif --}}

        {{-- Form untuk menambah data pegawai --}}
        <form action="/pegawai" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="1">Laki - laki</option>
                    <option value="0">Perempuan</option>
                </select> 
            </div>

            <div class="form-group">
                <label for="status_pernikahan">Status</label>
                <select class="form-control" name="status_pernikahan">
                    <option value="1">Menikah</option>
                    <option value="0">Belum Menikah</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" rows="5" class="form-control"></textarea>
            </div>
            
            <input type="submit" value="Submit" class="btn btn-primary"> 
        </form>
    </div>
</main>
@endsection