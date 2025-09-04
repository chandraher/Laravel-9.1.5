<?php

namespace App\Data;

class Mahasiswa
{
    public Kelas $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    
    public function namaKelas(): string
    {
        return $this->kelas->info();
    }
}