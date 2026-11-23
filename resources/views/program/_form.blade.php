@php
    $fields = [
        ['judul', 'Judul', 'text', 'Judul program beasiswa'],
        ['meta', 'Keterangan singkat', 'text', 'Contoh: 16 Jul 2026 · Malang Post'],
        ['url', 'Link tujuan (opsional)', 'text', 'https://...'],
        ['gambar', 'Link gambar (opsional)', 'text', 'https://...'],
        ['deadline', 'Tenggat (opsional)', 'date', ''],
    ];
@endphp

@foreach ($fields as [$name, $label, $type, $placeholder])
    <div>
        <label for="{{ $name }}" class="mb-1 block text-sm font-semibold">{{ $label }}</label>
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
               value="{{ old($name, isset($program) ? ($name === 'deadline' ? optional($program->deadline)->format('Y-m-d') : $program->$name) : '') }}"
               placeholder="{{ $placeholder }}"
               class="w-full rounded-lg border border-line bg-surface px-3 py-2">
        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
@endforeach

<div>
    <label for="deskripsi" class="mb-1 block text-sm font-semibold">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tulis deskripsi singkat"
              class="w-full rounded-lg border border-line bg-surface px-3 py-2">{{ old('deskripsi', $program->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

<div class="flex flex-wrap gap-3">
    <button type="submit" class="rounded-lg bg-accent px-5 py-2.5 font-semibold text-on-accent hover:brightness-105">Simpan</button>
    <a href="{{ route('program.index') }}" class="rounded-lg border border-line px-5 py-2.5 font-semibold text-primary-dark">Batal</a>
</div>