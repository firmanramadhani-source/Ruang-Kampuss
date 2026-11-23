<?php

namespace Database\Seeders;

use App\Models\Beasiswa;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Karier;
use App\Models\Komunitas;
use App\Models\Kos;
use App\Models\Lomba;
use Illuminate\Database\Seeder;

class PortalSeeder extends Seeder
{
    public function run(): void
    {
        // ===== BERITA =====
        $berita = [
            [
                'judul' => 'PHE ajak mahasiswa UB mengenal industri hulu migas lewat Upstream Youth Champs 2026',
                'deskripsi' => 'Pertamina Hulu Energi menggelar talkshow dan sesi pengembangan karier di Universitas Brawijaya, Selasa (3/11/2026).',
                'meta' => '6 Nov 2026 · Malang Post',
                'url' => 'https://malang-post.com/2026/11/06/phe-gelar-upstream-youth-champs-2026-universitas-brawijaya/',
                'gambar' => 'https://malang-post.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-06-at-13.51.40-1024x682.jpeg',
                'tanggal' => '2026-11-06',
            ],
            [
                'judul' => 'FIA UB terima 15 mahasiswa internasional, terbanyak di UB',
                'deskripsi' => 'Mayoritas berasal dari Pakistan; 14 orang mendapat beasiswa Brawijaya International School.',
                'meta' => '6 Nov 2026 · Radar Malang',
                'url' => 'https://radarmalang.jawapos.com/pendidikan/2611060029/fia-ub-terima-15-mahasiswa-internasional-terbanyak-di-ub',
                'gambar' => 'https://cdn-jpr.jawapos.com/images/15/2026/11/06/sebanyak-15-mahasiswa-internasional-memilih-fakultas-ilmu-administrasi-universitas-brawijaya-fia-ub-sebagai-tujuan-studi-pada-tahun-2026-tx7F6.webp',
                'tanggal' => '2026-11-06',
            ],
            [
                'judul' => 'Universitas Brawijaya tambah 5 profesor baru',
                'deskripsi' => 'Pengukuhan guru besar baru UB beserta gagasan inovatif yang mereka usung.',
                'meta' => '6 Nov 2026 · Malang Post',
                'url' => 'https://malang-post.com/2026/11/06/ub-tambah-lima-profesor-baru-pengukuhan-2026/',
                'gambar' => 'https://malang-post.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-06-at-18.17.42-1.jpeg',
                'tanggal' => '2026-11-06',
            ],
        ];
        foreach ($berita as $row) {
            Berita::create($row);
        }

        // ===== EVENT =====
        $event = [
            [
                'judul' => 'Malang Fashion Week 2026 usung tema REGEN',
                'deskripsi' => 'Digelar di Malang City Point 5–8 November 2026, memasuki tahun ke-9 dengan 85 desainer profesional, 5 guest designer nasional, dan 120 model; kategori Modest, Evening, Ethnic, Urban, hingga Kids Wear.',
                'meta' => '5–8 Nov 2026 · Malang Posco Media',
                'url' => 'https://malangposcomedia.id/resmi-dibuka-malang-fashion-week-2026-usung-tema-regen-untuk-dorong-pertumbuhan-ekonomi-kreatif/',
                'gambar' => 'https://malangposcomedia.id/wp-content/uploads/2026/11/Untitled-4-copy-1.webp',
                'mulai' => '2026-11-05',
                'selesai' => '2026-11-08',
            ],
            [
                'judul' => 'UNISMA gelar ICON-ELT 2026',
                'deskripsi' => 'Prodi Pendidikan Bahasa Inggris FKIP UNISMA menggelar konferensi internasional bertema transformasi pengajaran bahasa Inggris lewat teknologi dan Eco-ELT, diikuti 200 peserta dari enam negara.',
                'meta' => '5 Nov 2026 · Malang Post',
                'url' => 'https://malang-post.com/2026/11/05/unisma-gelar-icon-elt-2026-transformasi-pengajaran-bahasa-inggris/',
                'gambar' => 'https://malang-post.com/wp-content/uploads/2026/11/IMG-20261105-WA0059.jpg',
                'mulai' => '2026-11-05',
                'selesai' => '2026-11-05',
            ],
            [
                'judul' => 'Kanjuruhan Adiluhung digelar meriah',
                'deskripsi' => 'Pesta Hari Jadi Kabupaten Malang ke-1266 digelar 6–15 November 2026 di halaman Stadion Kanjuruhan, Kepanjen, dengan sebagian besar biaya dari pihak ketiga alias non-APBD.',
                'meta' => '6–15 Nov 2026 · TIMES Indonesia',
                'url' => 'https://timesindonesia.co.id/peristiwa-daerah/616354/kanjuruhan-adiluhung-nanti-malam-digelar-meriah-sebagian-besar-non-apbd',
                'gambar' => 'https://cdn2.timesmedia.co.id/cdn-times/uploads/news-thumbnail/2026/11/06/ilustrasi-thumbnail-iew6ve1i.webp',
                'mulai' => '2026-11-06',
                'selesai' => '2026-11-15',
            ],
        ];
        foreach ($event as $row) {
            Event::create($row);
        }

        // ===== BEASISWA =====
        $beasiswa = [
            [
                'judul' => 'Pemkot Malang salurkan beasiswa bagi pelajar dan mahasiswa tak mampu',
                'deskripsi' => 'Bantuan beasiswa pendidikan tahun anggaran 2026 disalurkan per tiga bulan untuk pelajar SMA dan mahasiswa dari keluarga tidak mampu.',
                'meta' => '9 Jun 2026 · ANTARA',
                'url' => 'https://www.antaranews.com/berita/5600797/pemkot-malang-salurkan-beasiswa-bagi-pelajar-dan-mahasiswa-tak-mampu',
                'gambar' => 'https://cdn.antaranews.com/cache/1200x800/2026/06/09/1001280815.jpg',
                'deadline' => null,
            ],
            [
                'judul' => 'UMM sediakan berbagai jalur beasiswa mahasiswa baru',
                'deskripsi' => 'Universitas Muhammadiyah Malang membuka berbagai skema beasiswa untuk penerimaan mahasiswa baru tahun akademik 2026/2027.',
                'meta' => '16 Jul 2026 · Malang Post',
                'url' => 'https://malang-post.com/2026/07/16/umm-sediakan-berbagai-jalur-beasiswa-mahasiswa-baru/',
                'gambar' => 'https://malang-post.com/wp-content/uploads/2026/07/Jalur_Beasiswa_UMM_2026_2027-1024x572.jpg',
                'deadline' => null,
            ],
            [
                'judul' => 'Unisma perkuat peran global lewat beasiswa mahasiswa asing',
                'deskripsi' => 'Beasiswa Baznas dan KNB membuka jalan mahasiswa asing, termasuk dari Palestina, kuliah di Universitas Islam Malang.',
                'meta' => '19 Agu 2026 · Malang Post',
                'url' => 'https://malang-post.com/2026/08/19/unisma-perkuat-peran-global-dan-solidaritas-palestina-melalui-beasiswa-mahasiswa-asing/',
                'gambar' => 'https://malang-post.com/wp-content/uploads/2026/08/WhatsApp-Image-2026-08-19-at-11.04.58.jpeg',
                'deadline' => null,
            ],
        ];
        foreach ($beasiswa as $row) {
            Beasiswa::create($row);
        }

        // ===== LOMBA =====
        $lomba = [
            [
                'judul' => 'MICEBIS III UIN Malang digelar daring',
                'deskripsi' => 'Kompetisi ekonomi internasional yang diselenggarakan secara daring oleh Fakultas Ekonomi UIN Maulana Malik Ibrahim Malang.',
                'meta' => '2026 · FE UIN Malang',
                'url' => 'https://fe.uin-malang.ac.id/uin-malang-siap-gelar-kompetisi-ekonomi-internasional-micebis-iii-secara-daring/',
                'gambar' => 'https://fe.uin-malang.ac.id/wp-content/uploads/2026/10/image-12.png',
                'deadline' => null,
            ],
            [
                'judul' => 'Lomba Petanque meriahkan Dies Natalis UM ke-72',
                'deskripsi' => 'Rangkaian lomba petanque dan fun games menyemarakkan peringatan Dies Natalis ke-72 Universitas Negeri Malang.',
                'meta' => '2026 · UM',
                'url' => 'https://um.ac.id/lomba-petanque-fun-games-meriahkan-dies-natalis-ke-72-um/',
                'gambar' => 'https://um.ac.id/wp-content/uploads/2026/09/Lomba-Petanque-Fun-Games-Meriahkan-Dies-Natalis-ke-72-UM-1080x675.webp',
                'deadline' => '2026-11-09',
            ],
            [
                'judul' => 'Olimpiade Sains Nasional 2026 resmi dibuka di UMM Malang',
                'deskripsi' => 'Olimpiade Sains Nasional 2026 resmi dibuka di Universitas Muhammadiyah Malang dan diikuti peserta dari berbagai daerah.',
                'meta' => '2026 · MAN 3 Bungo',
                'url' => 'https://man3bungo.mdrsh.id/news/83711/olimpiade-sains-nasional-2026-resmi-dibuka-di-umm-malang.html',
                'gambar' => 'https://storage.mdrsh.id/mdrsh/img/WTVlqOJqOQTcx0C.jpeg',
                'deadline' => '2026-11-06',
            ],
        ];
        foreach ($lomba as $row) {
            Lomba::create($row);
        }

        // ===== KARIER =====
        $karier = [
            [
                'judul' => 'Magang IT di Malang',
                'deskripsi' => 'Program magang bidang IT di Malang yang diselenggarakan Venturo untuk mahasiswa dan fresh graduate.',
                'meta' => 'Magang · Venturo',
                'url' => 'https://venturo.id/magang-it-malang/',
                'gambar' => 'https://venturo.id/assets/img/magang-hero-828.webp',
            ],
            [
                'judul' => 'Lowongan magang Bank Indonesia Malang',
                'deskripsi' => 'Program magang di Bank Indonesia Malang yang dipublikasikan melalui portal karier Universitas Brawijaya.',
                'meta' => 'Magang · Career UB',
                'url' => 'https://career.ub.ac.id/id/internship/lowongan-magang-bank-indonesia-malang/',
                'gambar' => 'https://career.ub.ac.id/wp-content/uploads/2025/12/Screenshot_30-12-2025_12922_www.instagram.com_.jpeg',
            ],
            [
                'judul' => 'Informasi magang di Malang',
                'deskripsi' => 'Informasi program magang di Malang dari Oyitok Group untuk mahasiswa yang ingin menambah pengalaman kerja.',
                'meta' => 'Magang · Oyitok Group',
                'url' => 'https://oyitokgroup.com/informasi-magang-di-malang/',
                'gambar' => 'https://oyitokgroup.com/wp-content/uploads/2023/11/Salinan-dari-Featured-image-4.webp',
            ],
        ];
        foreach ($karier as $row) {
            Karier::create($row);
        }

        // ===== KOS =====
        $kos = [
            [
                'judul' => 'Kost De Bilma Tipe Mezzanine (Putri)',
                'deskripsi' => 'Kost putri eksklusif di Sukun, Malang dengan tipe mezzanine — cek harga & fasilitas di Mamikos.',
                'meta' => 'Sukun · Mamikos',
                'url' => 'https://mamikos.com/room/kost-kota-malang-kost-putri-eksklusif-kost-de-bilma-tipe-mezzanine-sukun-malang-2?redirection_source=landing%20area',
                'gambar' => 'https://static.mamikos.com/uploads/cache/data/style/2025-09-17/tyCrjqmt-360x480.jpg',
            ],
            [
                'judul' => 'Kost Singgahsini Ruma Penataran Tipe C (Campur)',
                'deskripsi' => 'Kost campur murah di Lowokwaru, Malang yang dikelola Singgahsini — cek harga & fasilitas di Mamikos.',
                'meta' => 'Lowokwaru · Mamikos',
                'url' => 'https://mamikos.com/room/kost-kota-malang-kost-campur-murah-kost-singgahsini-ruma-penataran-tipe-c-lowokwaru-malang-2?redirection_source=landing%20area',
                'gambar' => 'https://static.mamikos.com/uploads/cache/data/style/2026-08-11/c0Bhfpl9-360x480.jpg',
            ],
            [
                'judul' => 'Kost Singgahsini Biella Griyashanta Tipe A (Putra)',
                'deskripsi' => 'Kost putra eksklusif di Lowokwaru, Malang yang dikelola Singgahsini — cek harga & fasilitas di Mamikos.',
                'meta' => 'Lowokwaru · Mamikos',
                'url' => 'https://mamikos.com/room/kost-kota-malang-kost-putra-eksklusif-kost-singgahsini-biella-griyashanta-tipe-a-lowokwaru-malang-2?redirection_source=landing%20area',
                'gambar' => 'https://static.mamikos.com/uploads/cache/data/style/2026-08-04/jxfTvOAY-360x480.jpg',
            ],
        ];
        foreach ($kos as $row) {
            Kos::create($row);
        }

        // ===== KOMUNITAS =====
        $komunitas = [
            [
                'judul' => 'Komunitas disabilitas produktif di Malang',
                'deskripsi' => 'Pemberdayaan berkelanjutan dan kolaboratif bagi komunitas disabilitas di Malang melalui pendekatan kolaboratif.',
                'meta' => 'Lingkar Sosial',
                'url' => 'https://lingkarsosial.org/komunitas-disabilitas-produktif-di-malang-pemberdayaan-berkelanjutan-dan-kolaboratif/',
                'gambar' => 'https://lingkarsosial.org/wp-content/uploads/2025/02/UKT-Educamp-Agni-Difabel-Pecinta-Alam-Tahun-2025.jpeg',
            ],
            [
                'judul' => 'Aksi sosial 4 mahasiswa Ilmu Komunikasi UM',
                'deskripsi' => 'Aksi sosial empat mahasiswa Ilmu Komunikasi UM yang membangun komunitas dan bergerak di bidang lingkungan.',
                'meta' => 'UM · Ilmu Komunikasi',
                'url' => 'https://ilmukomunikasi.um.ac.id/2023/12/11/aksi-sosial-yang-dilakukan-4-mahasiswa-ilmu-komunikasi-universitas-negeri-malang-yang-membangun-komunitas-dan-bergerak-di-bidang-lingkungan/',
                'gambar' => 'https://ilmukomunikasi.um.ac.id/wp-content/uploads/2023/12/Picture1.jpg',
            ],
            [
                'judul' => 'Komunitas di Malang',
                'deskripsi' => 'Kumpulan berita terbaru dan terkini seputar komunitas di Malang dari Suara.com.',
                'meta' => 'Suara.com',
                'url' => 'https://www.suara.com/tag/komunitas-di-malang',
                'gambar' => 'https://media.suara.com/pictures/653x366/2023/11/19/92034-komunitas-readingalam.webp',
            ],
        ];
        foreach ($komunitas as $row) {
            Komunitas::create($row);
        }
    }
}