@extends('layouts.app')

@section('title', 'Dashboard SIM-Surat')

@section('content')
<div class="rounded-2xl bg-gradient-to-r from-blue-700 via-blue-800 to-indigo-700 text-white p-6 mb-6 shadow-sm">
    <div class="max-w-2xl">
        <span class="inline-flex items-center gap-1.5 text-xs font-semibold bg-white/15 border border-white/20 px-3 py-1 rounded-full">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
            <span>Sistem Informasi Surat</span>
        </span>
        <h1 class="text-2xl font-extrabold mt-3 tracking-tight">
            Selamat Datang di Dashboard SIM-Surat
        </h1>
        <p class="text-sm text-blue-100 mt-1.5 leading-relaxed">
            Kelola arsip surat masuk dan surat keluar secara rapi, cepat, dan terstruktur dalam satu tampilan.
        </p>
    </div>
</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <a href="{{ route('surat-masuk.index') }}"
           class="group block p-5 rounded-2xl border border-blue-200/80 bg-gradient-to-br from-blue-50/80 to-white hover:border-blue-400 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-xs">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                </div>
                <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </div>
            <h2 class="text-lg font-bold text-slate-900 mt-4 group-hover:text-blue-700 transition">Surat Masuk</h2>
            <p class="text-sm text-slate-600 mt-1">
                Lihat daftar surat masuk, baca detail, serta tambah, ubah, dan hapus data surat.
            </p>
        </a>

        <a href="{{ route('surat-keluar.index') }}"
           class="group block p-5 rounded-2xl border border-indigo-200/80 bg-gradient-to-br from-indigo-50/80 to-white hover:border-indigo-400 hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center shadow-xs">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </div>
                <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </div>
            <h2 class="text-lg font-bold text-slate-900 mt-4 group-hover:text-indigo-700 transition">Surat Keluar</h2>
            <p class="text-sm text-slate-600 mt-1">
                Kelola arsip surat keluar, tujuan pengiriman, perihal, dan rincian keterangannya.
            </p>
        </a>
    </div>
@endsection