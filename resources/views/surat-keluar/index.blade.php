@extends('layouts.app')

@section('title', 'Daftar Surat Keluar')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 pb-4 mb-5 border-b border-slate-200">
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-blue-100 text-blue-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </span>
            <div>
                <h1 class="text-xl font-bold text-slate-900">Daftar Surat Keluar</h1>
                <p class="text-xs text-slate-500 mt-0.5">Pencarian, filter kategori, dan arsip surat keluar</p>
            </div>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-keluar.create') }}"
               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold shadow-xs transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Surat</span>
            </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="mb-5 flex items-center gap-2 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-sm font-medium text-emerald-800">
            <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form method="GET" action="{{ route('surat-keluar.index') }}" class="flex flex-wrap items-center gap-2.5 mb-5">
        <input type="text" name="q" value="{{ request('q') }}"
               placeholder="Nomor, tujuan, atau perihal"
               class="flex-1 min-w-52 rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">

        <select name="category_id"
                class="rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
            <option value="">Semua kategori</option>
            @foreach ($categories as $kategori)
                <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit"
                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
            </svg>
            <span>Cari / Filter</span>
        </button>

        <a href="{{ route('surat-keluar.index') }}"
           class="inline-flex items-center px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium transition">
            Reset
        </a>
    </form>

    <div class="overflow-x-auto border border-slate-200 rounded-xl">
        <table class="w-full text-left border-collapse text-sm">
            <thead>
                <tr class="bg-gradient-to-r from-slate-50 to-blue-50/60 border-b border-slate-200 text-slate-600 text-xs uppercase tracking-wider">
                    <th class="py-3 px-4 font-bold">No</th>
                    <th class="py-3 px-4 font-bold">Nomor</th>
                    <th class="py-3 px-4 font-bold">Tanggal</th>
                    <th class="py-3 px-4 font-bold">Tujuan</th>
                    <th class="py-3 px-4 font-bold">Perihal</th>
                    <th class="py-3 px-4 font-bold">Kategori</th>
                    <th class="py-3 px-4 font-bold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200/80">
                @forelse ($suratKeluar as $surat)
                    <tr class="hover:bg-blue-50/30 transition">
                        <td class="py-3 px-4 text-slate-500 font-medium">{{ $suratKeluar->firstItem() + $loop->index }}</td>
                        <td class="py-3 px-4 font-semibold text-blue-900">{{ $surat->nomor_surat }}</td>
                        <td class="py-3 px-4 text-slate-600">{{ $surat->tanggal }}</td>
                        <td class="py-3 px-4 text-slate-700">{{ $surat->tujuan }}</td>
                        <td class="py-3 px-4 text-slate-700">{{ $surat->perihal }}</td>
                        <td class="py-3 px-4">
                            <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $surat->category ? 'bg-blue-50 text-blue-800 border border-blue-200' : 'bg-slate-100 text-slate-500' }}">
                                {{ $surat->category?->nama ?? 'Tanpa kategori' }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex items-center justify-center gap-1.5">
                                <a href="{{ route('surat-keluar.show', $surat->id) }}"
                                   title="Detail" aria-label="Detail"
                                   class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-sky-50 text-sky-700 hover:bg-sky-600 hover:text-white border border-sky-200 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                @can('manage-letters')
                                    <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                                       title="Edit" aria-label="Edit"
                                       class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-amber-50 text-amber-700 hover:bg-amber-500 hover:text-white border border-amber-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form method="POST" action="{{ route('surat-keluar.destroy', $surat->id) }}" class="inline m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                title="Hapus" aria-label="Hapus"
                                                onclick="return confirm('Hapus surat ini?')"
                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-rose-50 text-rose-700 hover:bg-rose-600 hover:text-white border border-rose-200 transition cursor-pointer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-8 px-4 text-center text-slate-500">Belum ada surat keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex flex-wrap items-center justify-between gap-3 mt-5 text-sm text-slate-600">
        <div>
            Halaman <span class="font-semibold text-slate-900">{{ $suratKeluar->currentPage() }}</span>
            dari <span class="font-semibold text-slate-900">{{ $suratKeluar->lastPage() }}</span>
        </div>
        <div class="flex items-center gap-2">
            @if ($suratKeluar->previousPageUrl())
                <a href="{{ $suratKeluar->previousPageUrl() }}"
                   class="px-3.5 py-1.5 rounded-lg bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-medium transition">
                    Sebelumnya
                </a>
            @endif
            @if ($suratKeluar->nextPageUrl())
                <a href="{{ $suratKeluar->nextPageUrl() }}"
                   class="px-3.5 py-1.5 rounded-lg bg-white hover:bg-slate-50 text-slate-700 border border-slate-300 font-medium transition">
                    Berikutnya
                </a>
            @endif
        </div>
    </div>
@endsection