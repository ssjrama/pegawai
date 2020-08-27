<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Pegawai;

class PegawaiTest extends TestCase
{
    //use RefreshDatabase;

    public function test_store(){
        $pegawai = Pegawai::create([
            'nama' => 'Wahyu Ramadhan',
            'jenis_kelamin' => true,
            'status_pernikahan' => false,
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Indramayu'
        ]);

        $this->assertDatabaseHas('pegawai',[
            'nama' => 'Wahyu Ramadhan',
            'jenis_kelamin' => true,
            'status_pernikahan' => false,
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
        $pegawai = Pegawai::findOrFail(1);
        $pegawai->nama = 'Wahyu';
        $pegawai->jenis_kelamin = true;
        $pegawai->status_pernikahan = true;
        $pegawai->tanggal_lahir = '2000-11-20';
        $pegawai->alamat = 'Cirebon';
        $pegawai->save();

        $this->assertDatabaseHas('pegawai',[
            'nama' => 'Wahyu',
            'jenis_kelamin' => true,
            'status_pernikahan' => true,
            'tanggal_lahir' => '2000-11-20',
            'alamat' => 'Cirebon'
        ]);
    }

}
