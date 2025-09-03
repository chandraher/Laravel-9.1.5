<?php

namespace App\Data;

class Mahasiswa
{
    private Kelas $kelas;

    public function __construct(Kelas $kelas)
    {
        $this->kelas = $kelas;
    }

    
    public function info(): string
    {
        return $this->kelas->info();
    }
}