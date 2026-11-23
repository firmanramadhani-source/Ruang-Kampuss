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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuB-07Jn00t6HS9tiPDx_IXY_shsB7L3S5D_AA7ppv6w&s=10"
                     onerror="this.onerror=null;this.src='{{ asset('images/hero-campus.svg') }}';"
                     alt="Suasana kampus"
                     width="1200" height="750" fetchpriority="high"
                     referrerpolicy="no-referrer"
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
                    <div class="flex flex-wrap items-center gap-2">
                        @if ($section['id'] === 'beasiswa')
                            <a href="{{ route('program.create') }}" class="rounded-lg bg-accent px-3 py-1.5 text-sm font-semibold text-on-accent hover:brightness-105">+ Tambah</a>
                            <a href="{{ route('program.index') }}" class="rounded-lg border border-line px-3 py-1.5 text-sm font-semibold text-primary-dark">Kelola</a>
                        @endif
                        <span class="count-pill">{{ $section['items']->count() }} info</span>
                    </div>
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
            <h2 id="judul-kontak" class="mb-1 font-display text-2xl font-bold text-primary-dark">Kontak</h2>
            <p class="mb-6 text-soft">Punya info beasiswa atau lomba? Kirimkan ke kami.</p>

            <form id="contact-form" novalidate class="grid max-w-xl gap-4 rounded-2xl border border-line bg-card p-6">
                <div>
                    <label for="nama" class="mb-1 block text-sm font-semibold">Nama</label>
                    <input id="nama" name="nama" type="text" class="w-full rounded-lg border border-line bg-surface px-3 py-2" placeholder="Nama lengkap">
                    <p class="err mt-1 min-h-5 text-sm text-red-600" data-for="nama"></p>
                </div>
                <div>
                    <label for="email" class="mb-1 block text-sm font-semibold">Email</label>
                    <input id="email" name="email" type="email" class="w-full rounded-lg border border-line bg-surface px-3 py-2" placeholder="nama@@email.com">
                    <p class="err mt-1 min-h-5 text-sm text-red-600" data-for="email"></p>
                </div>
                <div>
                    <label for="pesan" class="mb-1 block text-sm font-semibold">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="4" class="w-full rounded-lg border border-line bg-surface px-3 py-2" placeholder="Tulis pesanmu (minimal 10 karakter)"></textarea>
                    <p class="err mt-1 min-h-5 text-sm text-red-600" data-for="pesan"></p>
                </div>
                <button type="submit" class="rounded-lg bg-accent px-5 py-2.5 font-semibold text-on-accent hover:brightness-105">Kirim pesan</button>
                <p id="form-ok" class="min-h-5 text-sm font-semibold text-primary" role="status"></p>
            </form>
        </section>
    </main>

    <script>
        (function () {
            var form = document.getElementById('contact-form');
            var formOk = document.getElementById('form-ok');
            function setErr(name, msg) {
                form.querySelector('.err[data-for="' + name + '"]').textContent = msg || '';
            }
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var nama = form.nama.value.trim();
                var email = form.email.value.trim();
                var pesan = form.pesan.value.trim();
                var valid = true;
                setErr('nama'); setErr('email'); setErr('pesan');
                formOk.textContent = '';

                if (nama.length < 1) { setErr('nama', 'Nama wajib diisi.'); valid = false; }
                if (email.indexOf('@') < 1 || email.indexOf('.', email.indexOf('@')) < 0) {
                    setErr('email', 'Format email tidak valid.'); valid = false;
                }
                if (pesan.length < 10) {
                    setErr('pesan', 'Pesan minimal 10 karakter (sekarang ' + pesan.length + ').'); valid = false;
                }
                if (!valid) return;

                formOk.textContent = 'Terima kasih, pesanmu sudah terkirim!';
                form.reset();
            });
        })();
    </script>
@endsection