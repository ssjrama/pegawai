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
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Hapus</button>
                            <!-- Modal untuk konfirmasi penghapusan data -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin akan menghapus data ini ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                    <form action="/pegawai/{{$p->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary">YES</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
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