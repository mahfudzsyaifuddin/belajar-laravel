@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-200">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-sky-100 text-sky-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
        </span>
        <div>
            <h1 class="text-xl font-bold text-slate-900">Detail Surat Keluar</h1>
            <p class="text-xs text-slate-500 mt-0.5">Informasi lengkap surat yang dipilih</p>
        </div>
    </div>

    <dl class="divide-y divide-slate-200/80 border border-slate-200 rounded-xl overflow-hidden mb-6 text-sm bg-slate-50/40">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5">
            <dt class="font-semibold text-slate-500">Nomor Surat</dt>
            <dd class="sm:col-span-2 font-bold text-blue-900">{{ $surat->nomor_surat }}</dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5 bg-white">
            <dt class="font-semibold text-slate-500">Tanggal</dt>
            <dd class="sm:col-span-2 text-slate-700">{{ $surat->tanggal }}</dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5">
            <dt class="font-semibold text-slate-500">Tujuan</dt>
            <dd class="sm:col-span-2 text-slate-700">{{ $surat->tujuan }}</dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5 bg-white">
            <dt class="font-semibold text-slate-500">Perihal</dt>
            <dd class="sm:col-span-2 text-slate-800 font-medium">{{ $surat->perihal }}</dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5">
            <dt class="font-semibold text-slate-500">Kategori</dt>
            <dd class="sm:col-span-2">
                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $surat->category ? 'bg-blue-50 text-blue-800 border border-blue-200' : 'bg-slate-100 text-slate-500' }}">
                    {{ $surat->category?->nama ?? 'Tanpa kategori' }}
                </span>
            </dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5 bg-white">
            <dt class="font-semibold text-slate-500">Lampiran</dt>
            <dd class="sm:col-span-2">
                @if ($surat->lampiran)
                    <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-1.5 text-blue-700 hover:text-blue-900 font-semibold underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        <span>Lihat lampiran</span>
                    </a>
                @else
                    <span class="text-slate-400">-</span>
                @endif
            </dd>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 px-4 py-3.5">
            <dt class="font-semibold text-slate-500">Keterangan</dt>
            <dd class="sm:col-span-2 text-slate-700">{{ $surat->keterangan ?? '-' }}</dd>
        </div>
    </dl>

    <a href="{{ route('surat-keluar.index') }}"
       class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 text-sm font-medium transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span>Kembali</span>
    </a>
@endsection