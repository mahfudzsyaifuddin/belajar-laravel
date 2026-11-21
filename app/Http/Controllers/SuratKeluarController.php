<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SuratKeluarController extends Controller
{
    private function dataSurat(): array
    {
        return [
            1 => [
                'id' => 1,
                'nomor_surat' => '001/FT/X/2026',
                'tanggal' => '2026-10-01',
                'tujuan' => 'Rektorat',
                'perihal' => 'Laporan Kegiatan',
                'keterangan' => 'Pengiriman laporan kegiatan',
            ],
            2 => [
                'id' => 2,
                'nomor_surat' => '002/BAA/X/2026',
                'tanggal' => '2026-10-02',
                'tujuan' => 'BAA',
                'perihal' => 'Pemberitahuan Akademik',
                'keterangan' => 'Informasi kegiatan akademik',
            ],
            3 => [
                'id' => 3,
                'nomor_surat' => '003/LPPM/X/2026',
                'tanggal' => '2026-10-03',
                'tujuan' => 'LPPM',
                'perihal' => 'Undangan Sosialisasi',
                'keterangan' => 'Sosialisasi penelitian',
            ],
        ];
    }

    public function index()
    {
        $suratKeluar = array_values($this->dataSurat());
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function show($id)
    {
        $surat = $this->dataSurat()[$id] ?? null;
        return view('surat-keluar.show', compact('surat'));
    }
}