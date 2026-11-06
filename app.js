// Foto dicari berdasarkan kata kunci (k) lewat LoremFlickr, sehingga sesuai topik kartu.
// u = link tujuan saat kartu diklik. GANTI dengan URL artikel/pengumuman yang tepat.
const gs = q => "https://www.google.com/search?q=" + encodeURIComponent(q);
const wa = n => "https://wa.me/62" + n.replace(/\D/g, "").slice(1);
const data = {
  berita: [
    {t:"PHE ajak mahasiswa UB mengenal industri hulu migas lewat Upstream Youth Champs 2026", d:"Pertamina Hulu Energi menggelar talkshow dan sesi pengembangan karier di Universitas Brawijaya, Selasa (3/11/2026).", m:"6 Nov 2026 · Malang Post", k:"seminar,students", u:"https://malang-post.com/2026/11/06/phe-gelar-upstream-youth-champs-2026-universitas-brawijaya/", im:"https://malang-post.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-06-at-13.51.40-1024x682.jpeg"},
    {t:"FIA UB terima 15 mahasiswa internasional, terbanyak di UB", d:"Mayoritas berasal dari Pakistan; 14 orang mendapat beasiswa Brawijaya International School.", m:"6 Nov 2026 · Radar Malang", k:"international,students,university", u:"https://radarmalang.jawapos.com/pendidikan/2611060029/fia-ub-terima-15-mahasiswa-internasional-terbanyak-di-ub", im:"https://cdn-jpr.jawapos.com/images/15/2026/11/06/sebanyak-15-mahasiswa-internasional-memilih-fakultas-ilmu-administrasi-universitas-brawijaya-fia-ub-sebagai-tujuan-studi-pada-tahun-2026-tx7F6.webp"},
    {t:"Universitas Brawijaya tambah 5 profesor baru", d:"Pengukuhan guru besar baru UB beserta gagasan inovatif yang mereka usung.", m:"6 Nov 2026 · Malang Post", k:"professor,graduation,ceremony", u:"https://malang-post.com/2026/11/06/ub-tambah-lima-profesor-baru-pengukuhan-2026/", im:"https://malang-post.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-06-at-18.17.42-1.jpeg", im2:"https://malang-post.com/wp-content/uploads/2026/11/WhatsApp-Image-2026-11-06-at-18.17.42-1-300x200.jpeg"},
  ],
  event: [
    {t:"Malang Fashion Week 2026 usung tema REGEN", d:"Digelar di Malang City Point 5–8 November 2026, memasuki tahun ke-9 dengan 85 desainer profesional, 5 guest designer nasional, dan 120 model; kategori Modest, Evening, Ethnic, Urban, hingga Kids Wear.", m:"5–8 Nov 2026 · Malang Posco Media", img:"fashion", k:"fashion,runway,model", u:"https://malangposcomedia.id/resmi-dibuka-malang-fashion-week-2026-usung-tema-regen-untuk-dorong-pertumbuhan-ekonomi-kreatif/", im:"https://malangposcomedia.id/wp-content/uploads/2026/11/Untitled-4-copy-1.webp"},
    {t:"UNISMA gelar ICON-ELT 2026", d:"Prodi Pendidikan Bahasa Inggris FKIP UNISMA menggelar konferensi internasional bertema transformasi pengajaran bahasa Inggris lewat teknologi dan Eco-ELT, diikuti 200 peserta dari enam negara.", m:"5 Nov 2026 · Malang Post", img:"elt", k:"english,teaching,conference", u:"https://malang-post.com/2026/11/05/unisma-gelar-icon-elt-2026-transformasi-pengajaran-bahasa-inggris/", im:"https://malang-post.com/wp-content/uploads/2026/11/IMG-20261105-WA0059.jpg"},
    {t:"Kanjuruhan Adiluhung digelar meriah", d:"Pesta Hari Jadi Kabupaten Malang ke-1266 digelar 6–15 November 2026 di halaman Stadion Kanjuruhan, Kepanjen, dengan sebagian besar biaya dari pihak ketiga alias non-APBD.", m:"6–15 Nov 2026 · TIMES Indonesia", img:"kanjuruhan", k:"culture,festival,tradition", u:"https://timesindonesia.co.id/peristiwa-daerah/616354/kanjuruhan-adiluhung-nanti-malam-digelar-meriah-sebagian-besar-non-apbd", im:"https://cdn2.timesmedia.co.id/cdn-times/uploads/news-thumbnail/2026/11/06/ilustrasi-thumbnail-iew6ve1i.webp"},
  ],
  beasiswa: [
    {t:"Pemkot Malang salurkan beasiswa bagi pelajar dan mahasiswa tak mampu", d:"Bantuan beasiswa pendidikan tahun anggaran 2026 disalurkan per tiga bulan untuk pelajar SMA dan mahasiswa dari keluarga tidak mampu.", m:"9 Jun 2026 · ANTARA", img:"pemkot", k:"scholarship", u:"https://www.antaranews.com/berita/5600797/pemkot-malang-salurkan-beasiswa-bagi-pelajar-dan-mahasiswa-tak-mampu", im:"https://cdn.antaranews.com/cache/1200x800/2026/06/09/1001280815.jpg"},
    {t:"UMM sediakan berbagai jalur beasiswa mahasiswa baru", d:"Universitas Muhammadiyah Malang membuka berbagai skema beasiswa untuk penerimaan mahasiswa baru tahun akademik 2026/2027.", m:"16 Jul 2026 · Malang Post", img:"umm", k:"scholarship", u:"https://malang-post.com/2026/07/16/umm-sediakan-berbagai-jalur-beasiswa-mahasiswa-baru/", im:"https://malang-post.com/wp-content/uploads/2026/07/Jalur_Beasiswa_UMM_2026_2027-1024x572.jpg"},
    {t:"Unisma perkuat peran global lewat beasiswa mahasiswa asing", d:"Beasiswa Baznas dan KNB membuka jalan mahasiswa asing, termasuk dari Palestina, kuliah di Universitas Islam Malang.", m:"19 Agu 2026 · Malang Post", img:"unisma", k:"scholarship", u:"https://malang-post.com/2026/08/19/unisma-perkuat-peran-global-dan-solidaritas-palestina-melalui-beasiswa-mahasiswa-asing/", im:"https://malang-post.com/wp-content/uploads/2026/08/WhatsApp-Image-2026-08-19-at-11.04.58.jpeg"},
  ],
  lomba: [
    {t:"MICEBIS III UIN Malang digelar daring", d:"Kompetisi ekonomi internasional yang diselenggarakan secara daring oleh Fakultas Ekonomi UIN Maulana Malik Ibrahim Malang.", m:"2026 · FE UIN Malang", img:"micebis", k:"economics,competition,students", u:"https://fe.uin-malang.ac.id/uin-malang-siap-gelar-kompetisi-ekonomi-internasional-micebis-iii-secara-daring/", im:"https://fe.uin-malang.ac.id/wp-content/uploads/2026/10/image-12.png"},
    {t:"Lomba Petanque meriahkan Dies Natalis UM ke-72", d:"Rangkaian lomba petanque dan fun games menyemarakkan peringatan Dies Natalis ke-72 Universitas Negeri Malang.", m:"2026 · UM", img:"petanque", k:"petanque,sport,competition", u:"https://um.ac.id/lomba-petanque-fun-games-meriahkan-dies-natalis-ke-72-um/", im:"https://um.ac.id/wp-content/uploads/2026/09/Lomba-Petanque-Fun-Games-Meriahkan-Dies-Natalis-ke-72-UM-1080x675.webp"},
    {t:"Olimpiade Sains Nasional 2026 resmi dibuka di UMM Malang", d:"Olimpiade Sains Nasional 2026 resmi dibuka di Universitas Muhammadiyah Malang dan diikuti peserta dari berbagai daerah.", m:"2026 · MAN 3 Bungo", img:"osn", k:"science,olympiad,students", u:"https://man3bungo.mdrsh.id/news/83711/olimpiade-sains-nasional-2026-resmi-dibuka-di-umm-malang.html", im:"https://storage.mdrsh.id/mdrsh/img/WTVlqOJqOQTcx0C.jpeg"},
  ],
  karier: [
    {t:"Magang IT di Malang", d:"Program magang bidang IT di Malang yang diselenggarakan Venturo untuk mahasiswa dan fresh graduate.", m:"Magang · Venturo", img:"venturo", k:"internship,technology,it", u:"https://venturo.id/magang-it-malang/", im:"https://venturo.id/assets/img/magang-hero-828.webp"},
    {t:"Lowongan magang Bank Indonesia Malang", d:"Program magang di Bank Indonesia Malang yang dipublikasikan melalui portal karier Universitas Brawijaya.", m:"Magang · Career UB", img:"bi", k:"internship,bank,finance", u:"https://career.ub.ac.id/id/internship/lowongan-magang-bank-indonesia-malang/", im:"https://career.ub.ac.id/wp-content/uploads/2025/12/Screenshot_30-12-2025_12922_www.instagram.com_.jpeg"},
    {t:"Informasi magang di Malang", d:"Informasi program magang di Malang dari Oyitok Group untuk mahasiswa yang ingin menambah pengalaman kerja.", m:"Magang · Oyitok Group", img:"oyitok", k:"internship,career,malang", u:"https://oyitokgroup.com/informasi-magang-di-malang/", im:"https://oyitokgroup.com/wp-content/uploads/2023/11/Salinan-dari-Featured-image-4.webp"},
  ],
  kos: [
    {t:"Kost De Bilma Tipe Mezzanine (Putri)", d:"Kost putri eksklusif di Sukun, Malang dengan tipe mezzanine — cek harga & fasilitas di Mamikos.", m:"Sukun · Mamikos", img:"kos1", k:"bedroom,room,interior", u:"https://mamikos.com/room/kost-kota-malang-kost-putri-eksklusif-kost-de-bilma-tipe-mezzanine-sukun-malang-2?redirection_source=landing%20area", im:"https://static.mamikos.com/uploads/cache/data/style/2025-09-17/tyCrjqmt-360x480.jpg"},
    {t:"Kost Singgahsini Ruma Penataran Tipe C (Campur)", d:"Kost campur murah di Lowokwaru, Malang yang dikelola Singgahsini — cek harga & fasilitas di Mamikos.", m:"Lowokwaru · Mamikos", img:"kos2", k:"bedroom,room,cozy", u:"https://mamikos.com/room/kost-kota-malang-kost-campur-murah-kost-singgahsini-ruma-penataran-tipe-c-lowokwaru-malang-2?redirection_source=landing%20area", im:"https://static.mamikos.com/uploads/cache/data/style/2026-08-11/c0Bhfpl9-360x480.jpg"},
    {t:"Kost Singgahsini Biella Griyashanta Tipe A (Putra)", d:"Kost putra eksklusif di Lowokwaru, Malang yang dikelola Singgahsini — cek harga & fasilitas di Mamikos.", m:"Lowokwaru · Mamikos", img:"kos3", k:"dormitory,room,student", u:"https://mamikos.com/room/kost-kota-malang-kost-putra-eksklusif-kost-singgahsini-biella-griyashanta-tipe-a-lowokwaru-malang-2?redirection_source=landing%20area", im:"https://static.mamikos.com/uploads/cache/data/style/2026-08-04/jxfTvOAY-360x480.jpg"},
  ],
  komunitas: [
    {t:"Komunitas disabilitas produktif di Malang", d:"Pemberdayaan berkelanjutan dan kolaboratif bagi komunitas disabilitas di Malang melalui pendekatan kolaboratif.", m:"Lingkar Sosial", img:"disabilitas", k:"community,disability,inclusion", u:"https://lingkarsosial.org/komunitas-disabilitas-produktif-di-malang-pemberdayaan-berkelanjutan-dan-kolaboratif/", im:"https://lingkarsosial.org/wp-content/uploads/2025/02/UKT-Educamp-Agni-Difabel-Pecinta-Alam-Tahun-2025.jpeg"},
    {t:"Aksi sosial 4 mahasiswa Ilmu Komunikasi UM", d:"Aksi sosial empat mahasiswa Ilmu Komunikasi UM yang membangun komunitas dan bergerak di bidang lingkungan.", m:"UM · Ilmu Komunikasi", img:"lingkungan", k:"community,environment,volunteer", u:"https://ilmukomunikasi.um.ac.id/2023/12/11/aksi-sosial-yang-dilakukan-4-mahasiswa-ilmu-komunikasi-universitas-negeri-malang-yang-membangun-komunitas-dan-bergerak-di-bidang-lingkungan/", im:"https://ilmukomunikasi.um.ac.id/wp-content/uploads/2023/12/Picture1.jpg"},
    {t:"Komunitas di Malang", d:"Kumpulan berita terbaru dan terkini seputar komunitas di Malang dari Suara.com.", m:"Suara.com", img:"suara", k:"community,malang,people", u:"https://www.suara.com/tag/komunitas-di-malang", im:"https://media.suara.com/pictures/653x366/2023/11/19/92034-komunitas-readingalam.webp"},
  ],
};

// Ikon per kartu + warna per section. Dibuat inline (tanpa CSS tambahan) agar selalu tampil.
const EMO = {
  // event
  fashion:"👗", elt:"🗣️", kanjuruhan:"🎭",
  // lomba
  micebis:"💹", petanque:"🎯", osn:"🔬",
  // karier
  venturo:"💻", bi:"🏦", oyitok:"🧑‍💼",
  // kos
  kos1:"🏠", kos2:"🏡", kos3:"🛏️",
  // komunitas
  disabilitas:"♿", lingkungan:"🌱", suara:"📰",
  // beasiswa lama (dipertahankan)
  pemkot:"🏛️", umm:"🎓", unisma:"🌍",
  // cadangan umum
  expo:"🎪", speaker:"🎤", film:"🎬", cyber:"💻", bridge:"🌉",
  barista:"☕", office:"🗂️", intern:"💼", room1:"🏠", room2:"🏡", room3:"🛏️",
  korea:"✍️", teater:"🎭", gemapedia:"📚", binus:"🎯"
};
const GRAD = {berita:"#1d4ed8,#0ea5e9",event:"#7c3aed,#db2777",beasiswa:"#047857,#14b8a6",lomba:"#b45309,#f59e0b",karier:"#0f766e,#0284c7",kos:"#475569,#0f172a",komunitas:"#be123c,#f97316"};
// Tanggal berakhir (data dari daftar awalmu); kartu yang lewat diberi label "Sudah lewat".
const END = {fashion:"2026-11-08", kanjuruhan:"2026-11-06", petanque:"2026-11-09", osn:"2026-11-06"};
const today = new Date().toISOString().slice(0,10);
const artStyle = (k) => "display:flex;align-items:center;justify-content:center;height:11rem;width:100%;font-size:4.5rem;background:linear-gradient(135deg," + GRAD[k] + ")";
const wes = u => "https://images.weserv.nl/?url=" + encodeURIComponent(u.replace(/^https?:\/\//, "")) + "&w=800&h=480&fit=cover&output=jpg";
// Urutan percobaan: langsung -> lewat proxy gambar (menembus blokir hotlink) -> cadangan -> ikon.
function artFail(img){
  const next = (img.dataset.s || "").split("|").filter(Boolean);
  if (next.length) { img.dataset.s = next.slice(1).join("|"); img.src = next[0]; return; }
  const d = document.createElement("div");
  d.setAttribute("role","img"); d.setAttribute("aria-label", img.alt);
  d.setAttribute("style", artStyle(img.dataset.k)); d.textContent = img.dataset.e || "📰";
  img.replaceWith(d);
}
function card(i, k){
  const e = EMO[i.img] || "📰";
  const done = END[i.img] && END[i.img] < today;
  const srcs = i.im ? [i.im, wes(i.im), ...(i.im2 ? [i.im2, wes(i.im2)] : [])] : [];
  const media = i.im
    ? `<img src="${srcs[0]}" data-s="${srcs.slice(1).join("|")}" data-e="${e}" data-k="${k}" referrerpolicy="no-referrer" onerror="artFail(this)" alt="${i.t}" class="h-44 w-full object-cover">`
    : `<div role="img" aria-label="Ilustrasi ${i.t}" style="${artStyle(k)}">${e}</div>`;
  return `<a href="${i.u}" target="_blank" rel="noopener noreferrer" class="block" style="height:100%" aria-label="${i.t} (buka di tab baru)">
  <article class="flex flex-col overflow-hidden rounded-2xl border border-line bg-card shadow-sm" style="height:100%${done ? ";opacity:.75" : ""}">
    ${media}
    <div class="flex flex-1 flex-col p-5">
      <h3 class="mb-2 font-display text-lg font-semibold leading-snug text-primary-dark">${i.t}</h3>
      <p class="flex-1 text-sm leading-relaxed text-soft">${i.d}</p>
      <p class="mt-4 border-t border-line pt-3 text-xs font-semibold text-primary">${i.m}${done ? " · Sudah lewat" : ""}</p>
    </div>
  </article></a>`;
}
for (const k in data) document.getElementById("grid-"+k).innerHTML = data[k].map(i => card(i, k)).join("");

// ===== Toggle menu mobile =====
const menuBtn = document.getElementById("menu-btn");
const menu = document.getElementById("menu");
if (menuBtn && menu) {
  menuBtn.addEventListener("click", () => {
    const open = !menu.classList.toggle("hidden");
    menuBtn.setAttribute("aria-expanded", String(open));
    menuBtn.setAttribute("aria-label", open ? "Tutup menu" : "Buka menu");
  });
}

// ===== Validasi form kontak =====
const form = document.getElementById("contact-form");
if (form) {
  const formOk = document.getElementById("form-ok");
  const setErr = (name, msg) => {
    const p = form.querySelector(`.err[data-for="${name}"]`);
    if (p) p.textContent = msg || "";
  };

  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const nama  = form.nama.value.trim();
    const email = form.email.value.trim();
    const pesan = form.pesan.value.trim();

    let valid = true;
    setErr("nama", ""); setErr("email", ""); setErr("pesan", "");
    if (formOk) formOk.textContent = "";

    if (nama.length < 1) {
      setErr("nama", "Nama wajib diisi.");
      valid = false;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      setErr("email", "Format email tidak valid.");
      valid = false;
    }
    if (pesan.length < 10) {
      setErr("pesan", "Pesan minimal 10 karakter (sekarang " + pesan.length + ").");
      valid = false;
    }

    if (!valid) return;

    // Sukses (tanpa backend — hanya konfirmasi di UI)
    if (formOk) formOk.textContent = "Terima kasih, pesanmu sudah terkirim!";
    form.reset();
  });
}