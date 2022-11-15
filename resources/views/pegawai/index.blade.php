@extends('layouts.admin')
@section('content')    
<main class="dash-content">
    <div class="container-fluid">
       <a href="/pegawai/create" class="btn btn-primary">Tambah Data Pegawai</a>
        @if (count($pegawai)>0) {{-- mengecek apakah terdapat data pegawai --}}
            <table id="datatables" class="table table-striped display">
                <thead>
                    <tr>
                        <th>Nomor Pegawai</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- typo pgwai  --}}
                    @foreach ($pegawai as $p)
                <tr>

                    {{-- Menampilkan id dengan tambahan kar --}}

                    @if ($p->id < 10)
                        <td>Kar0{{$p->id}}</td>
                    @else
                        <td>Kar{{$p->id}}</td>
                    @endif
                    <td>{{$p->nama}}</td>

                    {{-- Mengecek jenis kelamin. Laki - laki jika true  --}}

                    @if ($p->jenis_kelamin == true)
                        <td>Laki - laki</td>
                    @else
                        <td>Perempuan</td>
                    @endif

                    {{-- Mengecek status pernikahan. Menikah jika true  --}}

                    @if ($p->status_pernikahan == true)
                        <td>Menikah</td>
                    @else
                        <td>Belum Menikah</td>
                    @endif

                    {{-- Menampilkan tanggal sesuai format --}}

                    <td>{{date('Y-m-d', strtotime($p->tanggal_lahir))}}</td>
                    <td>{{$p->alamat}}</td>
                    <td><a href="/pegawai/{{$p->id}}/edit" class="btn btn-success">Edit</a></td>
                    <td>
                        <form action="/pegawai/{{$p->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                </tbody>
           </table>        
       @else
       @endif
    </div>
</main>
@endsection