@extends('layouts.app')

@section('title', 'Ruang Kampus — Portal Mahasiswa Malang')

@section('content')
    <section class="hero bg-primary-dark text-white">
        <div class="mx-auto grid max-w-6xl items-center gap-8 px-6 py-14 md:grid-cols-2">
            <div>
                <p class="hero-eyebrow">Portal mahasiswa Malang</p>
                <h1 class="font-display text-4xl font-bold leading-tight md:text-5xl">Semua urusan kuliah di Malang, dalam satu ruang.</h1>
                <p class="mt-4 max-w-md text-secondary">Berita kampus, beasiswa, lomba, magang, dan kos, dikumpulkan dari kampus-kampus di Malang.</p>
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <a href="#beasiswa" class="inline-block rounded-lg bg-accent px-5 py-2.5 font-semibold text-on-accent hover:brightness-105">Lihat beasiswa</a>
                    <span class="hero-note">{{ $total }} info dari tujuh kategori</span>
                </div>
            </div>
            <div class="hero-media">
                <img src="{{ asset('images/hero-campus.svg') }}"
                     alt="Ilustrasi kampus dengan gedung utama, menara jam, dan pepohonan"
                     width="1200" height="750" fetchpriority="high"
                     class="h-64 w-full rounded-2xl object-cover md:h-72">
            </div>
        </div>
    </section>

    <main id="konten" tabindex="-1" class="mx-auto max-w-6xl px-6">
        @foreach ($sections as $section)
            <section id="{{ $section['id'] }}"
                     class="{{ $loop->first ? 'py-12' : 'border-t border-line py-12' }}"
                     aria-labelledby="judul-{{ $section['id'] }}">
                <div class="section-head">
                    <div>
                        <h2 id="judul-{{ $section['id'] }}" class="font-display text-2xl font-bold text-primary-dark">{{ $section['title'] }}</h2>
                        <p class="section-sub">{{ $section['description'] }}</p>
                    </div>
                    <span class="count-pill">{{ $section['items']->count() }} info</span>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($section['items'] as $item)
                        <a href="{{ $item->url ?: '#' }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="card-link"
                           aria-label="{{ $item->judul }} (buka di tab baru)">
                            <article class="card flex flex-col overflow-hidden rounded-2xl border border-line bg-card shadow-sm">
                                <img src="{{ $item->gambar ?: asset('images/placeholder.svg') }}"
                                     alt="{{ $item->judul }}"
                                     loading="lazy"
                                     decoding="async"
                                     referrerpolicy="no-referrer"
                                     onerror="this.onerror=null;this.src='{{ asset('images/placeholder.svg') }}';"
                                     class="h-44 w-full object-cover">
                                <div class="flex flex-1 flex-col p-5">
                                    <h3 class="mb-2 font-display text-lg font-semibold leading-snug text-primary-dark">{{ $item->judul }}</h3>
                                    <p class="flex-1 text-sm leading-relaxed text-soft">{{ $item->deskripsi }}</p>
                                    <p class="mt-4 border-t border-line pt-3 text-xs font-semibold text-primary">{{ $item->meta }}</p>
                                </div>
                            </article>
                        </a>
                    @empty
                        <p class="empty-state">Belum ada data untuk kategori ini.</p>
                    @endforelse
                </div>
            </section>
        @endforeach

        <section id="kontak" class="border-t border-line py-12" aria-labelledby="judul-kontak">
            <div class="max-w-xl rounded-2xl border border-line bg-card p-6">
                <h2 id="judul-kontak" class="font-display text-2xl font-bold text-primary-dark">Kontak</h2>
                <p class="mt-2 text-sm leading-relaxed text-soft">
                    Punya info beasiswa, lomba, atau kegiatan kampus? Kirimkan ke
                    <a class="font-semibold text-primary" href="mailto:redaksi@ruangkampus.id">redaksi@ruangkampus.id</a>.
                </p>
            </div>
        </section>
    </main>
@endsection