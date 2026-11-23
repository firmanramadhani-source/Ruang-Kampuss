@extends('layouts.app')

@section('title', 'Kelola Program Beasiswa')

@section('content')
    <main class="mx-auto max-w-6xl px-6 py-12">
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="font-display text-3xl font-bold text-primary-dark">Kelola Program Beasiswa</h1>
                <p class="text-soft">Tambah, ubah, dan hapus data beasiswa.</p>
            </div>
            <a href="{{ route('program.create') }}" class="rounded-lg bg-accent px-5 py-2.5 font-semibold text-on-accent hover:brightness-105">+ Tambah data</a>
        </div>

        @if (session('success'))
            <p class="mb-4 rounded-lg border border-line bg-card px-4 py-3 text-sm font-semibold text-primary" role="status">{{ session('success') }}</p>
        @endif

        <div class="overflow-x-auto rounded-2xl border border-line bg-card">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-line text-primary-dark">
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Keterangan</th>
                        <th class="px-4 py-3">Tenggat</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($programs as $program)
                        <tr class="border-b border-line align-top">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $program->judul }}</td>
                            <td class="px-4 py-3 text-soft">{{ $program->meta }}</td>
                            <td class="px-4 py-3">{{ $program->deadline ? $program->deadline->format('d M Y') : '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('program.edit', $program->id) }}" class="rounded-lg border border-line px-3 py-1.5 font-semibold text-primary-dark">Edit</a>
                                    <form action="{{ route('program.destroy', $program->id) }}" method="POST"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg border border-line px-3 py-1.5 font-semibold text-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-soft">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection