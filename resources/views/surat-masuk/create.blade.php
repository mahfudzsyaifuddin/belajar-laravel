@extends('layouts.app')

@section('title', 'Tambah Surat Masuk')

@section('content')
    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-200">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-blue-100 text-blue-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </span>
        <div>
            <h1 class="text-xl font-bold text-slate-900">Tambah Surat Masuk</h1>
            <p class="text-xs text-slate-500 mt-0.5">Isi formulir berikut untuk menyimpan surat masuk baru</p>
        </div>
    </div>

    <form action="{{ route('surat-masuk.store') }}" method="POST" class="space-y-4 max-w-xl">
        @csrf

        <div>
            <label for="nomor_surat" class="block text-sm font-semibold text-slate-700 mb-1">Nomor Surat</label>
            <input id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
            @error('nomor_surat')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tanggal" class="block text-sm font-semibold text-slate-700 mb-1">Tanggal</label>
            <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal') }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
            @error('tanggal')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="pengirim" class="block text-sm font-semibold text-slate-700 mb-1">Pengirim</label>
            <input id="pengirim" name="pengirim" value="{{ old('pengirim') }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
            @error('pengirim')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="perihal" class="block text-sm font-semibold text-slate-700 mb-1">Perihal</label>
            <input id="perihal" name="perihal" value="{{ old('perihal') }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
            @error('perihal')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keterangan" class="block text-sm font-semibold text-slate-700 mb-1">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="3"
                      class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2.5 pt-2">
            <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold shadow-xs transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Simpan</span>
            </button>
            <a href="{{ route('surat-masuk.index') }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 text-sm font-medium transition">
                <span>Batal</span>
            </a>
        </div>
    </form>
@endsection