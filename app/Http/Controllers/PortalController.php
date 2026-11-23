<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Karier;
use App\Models\Komunitas;
use App\Models\Kos;
use App\Models\Lomba;
use Illuminate\Contracts\View\View;

class PortalController extends Controller
{
    /**
     * Tampilkan seluruh konten portal dari tujuh tabel.
     */
    public function index(): View
    {
        $beritas = Berita::query()
            ->orderByDesc('tanggal')
            ->orderBy('id')
            ->get();

        $events = Event::query()
            ->orderBy('mulai')
            ->get();

        $beasiswas = Beasiswa::query()
            ->orderByRaw('deadline IS NULL')
            ->orderBy('deadline')
            ->get();

        $lombas = Lomba::query()
            ->orderByRaw('deadline IS NULL')
            ->orderBy('deadline')
            ->get();

        $kariers = Karier::query()
            ->latest('id')
            ->get();

        $kos = Kos::query()
            ->latest('id')
            ->get();

        $komunitas = Komunitas::query()
            ->latest('id')
            ->get();

        $sections = [
            [
                'id' => 'berita',
                'title' => 'Berita kampus',
                'description' => 'Prestasi dan kabar terbaru dari kampus Malang.',
                'items' => $beritas,
            ],
            [
                'id' => 'event',
                'title' => 'Event',
                'description' => 'Acara terbuka yang bisa kamu ikuti bulan ini.',
                'items' => $events,
            ],
            [
                'id' => 'beasiswa',
                'title' => 'Beasiswa',
                'description' => 'Periksa kembali tenggat di situs penyelenggara.',
                'items' => $beasiswas,
            ],
            [
                'id' => 'lomba',
                'title' => 'Lomba dan kompetisi',
                'description' => 'Kompetisi yang masih berjalan.',
                'items' => $lombas,
            ],
            [
                'id' => 'karier',
                'title' => 'Karier',
                'description' => 'Part-time dan magang di Malang.',
                'items' => $kariers,
            ],
            [
                'id' => 'kos',
                'title' => 'Kos mahasiswa',
                'description' => 'Hubungi pemilik untuk cek ketersediaan kamar.',
                'items' => $kos,
            ],
            [
                'id' => 'komunitas',
                'title' => 'Komunitas',
                'description' => 'UKM dan organisasi yang aktif.',
                'items' => $komunitas,
            ],
        ];

        return view('portal.index', [
            'sections' => $sections,
            'total' => collect($sections)->sum(
                fn (array $section): int => $section['items']->count()
            ),
        ]);
    }
}