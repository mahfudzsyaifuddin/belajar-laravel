<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SuratMasukController extends Controller
{
    private function dataSurat(): array
    {
        return [
            1 => [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '2026-10-01',
                'pengirim' => 'Fakultas Teknik',
                'perihal' => 'Undangan Rapat',
                'keterangan' => 'Undangan rapat koordinasi',
            ],
            2 => [
                'id' => 2,
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '2026-10-02',
                'pengirim' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik',
                'keterangan' => 'Informasi kegiatan akademik',
            ],
            3 => [
                'id' => 3,
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '2026-10-03',
                'pengirim' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Sosialisasi penelitian',
            ],
        ];
    }

    public function index()
    {
        $suratMasuk = array_values($this->dataSurat());
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function show($id)
    {
        $surat = $this->dataSurat()[$id] ?? null;
        return view('surat-masuk.show', compact('surat'));
    }
}