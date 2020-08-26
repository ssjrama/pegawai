<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Pegawai;

class PegawaiTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(){
        $pegawai = Pegawai::create([
            'nama' => 'Wahyu Ramadhan',
            'jenis_kelamin' => 'L',
            'status_pernikahan' => 'M',
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Indramayu'
        ]);

        $this->assertDatabaseHas('pegawai',[
            'nama' => 'Wahyu Ramadhan',
            'jenis_kelamin' => 'L',
            'status_pernikahan' => 'M',
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Indramayu'
        ]);
    }

    public function test_destroy(){
        $pegawai = Pegawai::destroy(4);
        $this->assertDatabaseMissing('pegawai',[
            'id' => 4
        ]);
    }

    public function test_update(){
        $pegawai = Pegawai::create([
            'nama' => 'Wahyu Ramadhan',
            'jenis_kelamin' => 'L',
            'status_pernikahan' => 'M',
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Indramayu'
        ]);

        $pegawai = Pegawai::findOrFail(2);
        $pegawai->nama = 'Wahyu';
        $pegawai->jenis_kelamin = 'L';
        $pegawai->status_pernikahan = 'M';
        $pegawai->tanggal_lahir = '2000-11-20';
        $pegawai->alamat = 'Cirebon';
        $pegawai->save();

        $this->assertDatabaseHas('pegawai',[
            'nama' => 'Wahyu',
            'jenis_kelamin' => 'L',
            'status_pernikahan' => 'M',
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Cirebon'
        ]);
    }

}
