@extends('layouts.app')

@section('title', 'Edit Surat Masuk')

@section('content')
    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-200">
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-amber-100 text-amber-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </span>
        <div>
            <h1 class="text-xl font-bold text-slate-900">Edit Surat Masuk</h1>
            <p class="text-xs text-slate-500 mt-0.5">Perbarui data, kategori, atau file lampiran surat</p>
        </div>
    </div>

    <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-xl">
        @csrf
        @method('PUT')

        <div>
            <label for="nomor_surat" class="block text-sm font-semibold text-slate-700 mb-1">Nomor Surat</label>
            <input id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
            @error('nomor_surat')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tanggal" class="block text-sm font-semibold text-slate-700 mb-1">Tanggal</label>
            <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
            @error('tanggal')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="pengirim" class="block text-sm font-semibold text-slate-700 mb-1">Pengirim</label>
            <input id="pengirim" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
            @error('pengirim')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="perihal" class="block text-sm font-semibold text-slate-700 mb-1">Perihal</label>
            <input id="perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}"
                   class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
            @error('perihal')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block text-sm font-semibold text-slate-700 mb-1">Kategori</label>
            <select id="category_id" name="category_id"
                    class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 bg-white focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                <option value="">-- Tanpa kategori --</option>
                @foreach ($categories as $kategori)
                    <option value="{{ $kategori->id }}" @selected(old('category_id', $surat->category_id ?? '') == $kategori->id)>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="lampiran" class="block text-sm font-semibold text-slate-700 mb-1">Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
            @if ($surat->lampiran)
                <p class="text-xs text-slate-500 mb-1.5">
                    Lampiran saat ini:
                    <a href="{{ asset('storage/' . $surat->lampiran) }}" target="_blank" rel="noopener" class="text-blue-700 underline font-medium">
                        Lihat lampiran
                    </a>
                </p>
            @endif
            <input id="lampiran" type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png"
                   class="w-full rounded-xl border border-slate-300 px-3 py-1.5 text-sm text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-800 hover:file:bg-amber-100">
            @error('lampiran')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="keterangan" class="block text-sm font-semibold text-slate-700 mb-1">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="3"
                      class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">{{ old('keterangan', $surat->keterangan) }}</textarea>
            @error('keterangan')
                <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2.5 pt-2">
            <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold shadow-xs transition cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span>Simpan Perubahan</span>
            </button>
            <a href="{{ route('surat-masuk.index') }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 text-sm font-medium transition">
                <span>Batal</span>
            </a>
        </div>
    </form>
@endsection