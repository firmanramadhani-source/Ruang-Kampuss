<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Ruang Kampus')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="bg-surface font-sans text-ink antialiased">
<header class="sticky top-0 z-20 border-b border-line bg-surface/95 backdrop-blur">
    <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-6 gap-y-2 px-6 py-3">
        <a href="{{ route('portal.index') }}" class="font-display text-xl font-bold text-primary-dark">Ruang Kampus</a>
        <button id="menu-btn" type="button" aria-controls="menu" aria-expanded="false" aria-label="Buka menu"
                class="rounded-lg border border-line px-3 py-1.5 text-sm font-semibold text-primary-dark md:hidden">Menu</button>
        <nav id="menu" class="hidden w-full flex-col gap-1 text-sm md:flex md:w-auto md:flex-row">
            @foreach (['berita' => 'Berita', 'event' => 'Event', 'beasiswa' => 'Beasiswa', 'lomba' => 'Lomba', 'karier' => 'Karier', 'kos' => 'Kos', 'komunitas' => 'Komunitas', 'kontak' => 'Kontak'] as $id => $label)
                <a class="rounded-full px-3 py-1.5 text-soft hover:bg-accent/20 hover:text-primary-dark" href="{{ route('portal.index') }}#{{ $id }}">{{ $label }}</a>
            @endforeach
            <a class="rounded-full bg-accent/20 px-3 py-1.5 font-semibold text-primary-dark hover:bg-accent/40" href="{{ route('program.index') }}">Kelola Beasiswa</a>
        </nav>
    </div>
</header>

@yield('content')

<footer class="border-t border-line bg-card py-8 text-sm text-soft">
    <div class="mx-auto max-w-6xl px-6">Ruang Kampus, dibuat untuk mahasiswa Malang.</div>
</footer>

<script>
    const btn = document.getElementById('menu-btn'), menu = document.getElementById('menu');
    btn.addEventListener('click', () => {
        const open = !menu.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', open);
        btn.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    });
</script>
</body>
</html>