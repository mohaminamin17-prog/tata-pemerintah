---
name: tapem-tojo-una-una
description: Prompt untuk membangun website Bagian Tata Pemerintahan (Tapem) Kabupaten Tojo Una-Una. Mencakup sitemap, user flow, data flow, UI flow, dan manajemen peran.
version: 1.0.0
tags: [pemerintahan, website, tapem, tojo-una-una, full-stack]
---

# Tapem Tojo Una-Una — Website Prompt

## Konteks

Kamu adalah developer yang membangun **website resmi Bagian Tata Pemerintahan (Tapem) Kabupaten Tojo Una-Una**. Website ini berfungsi sebagai portal informasi publik sekaligus alat bantu administrasi internal bagi staf Tapem.

Website harus:
- Menampilkan informasi kelembagaan secara publik
- Menyediakan akses ke dokumen dan layanan digital
- Dikelola melalui panel admin yang sederhana
- Terintegrasi dengan layanan eksternal (Google Drive, BIG, SPM, YouTube)

---

## Arsitektur Menu (Sitemap)

```
/ (Beranda)
  └── Visi & Misi Kabupaten Tojo Una-Una

/profil
  └── Struktur Organisasi Bagian Tapem (gambar/PDF)

/sub-bagian
  ├── /otda (Otonomi Daerah)
  │     ├── Modul LPPD     → tombol redirect ke Google Drive
  │     └── Modul Kerja Sama → timeline status kerja sama
  │
  ├── /pemerintahan
  │     ├── Modul EKK      → tabel peringkat kecamatan (dinamis)
  │     └── Modul SPM      → tombol redirect ke aplikasi SPM
  │
  └── /kewilayahan
        ├── Peta Wilayah   → peta interaktif dengan filter Kab/Kec/Desa
        ├── Rupa Bumi      → redirect ke sinar.big.go.id (tab baru)
        └── Modul LKPJ     → tombol redirect ke Google Drive

/dokumentasi
  └── Galeri Foto & Video Kegiatan
```

---

## Role & Hak Akses

### Admin Tapem
Dapat melakukan semua operasi berikut melalui panel `/admin`:
- Edit konten Visi & Misi
- Upload/ganti file Struktur Organisasi (PNG, PDF)
- Input dan update URL link untuk LPPD dan LKPJ
- Input nilai EKK per kecamatan (sistem hitung peringkat otomatis)
- Update status dan dokumen Kerja Sama Daerah
- Upload foto dan paste link video YouTube untuk galeri

### Masyarakat / Publik (tanpa login)
- Hanya dapat membaca dan mengakses semua konten yang dipublikasikan
- Tidak dapat mengubah data apapun

### Layanan Eksternal (integrasi satu arah)
| Layanan | Fungsi |
|---|---|
| Google Drive | Penyimpanan data dukung LPPD & LKPJ |
| sinar.big.go.id | Portal peta Rupa Bumi nasional |
| Aplikasi SPM | Sistem SPM Kemendagri/daerah |
| YouTube | Embed video dokumentasi kegiatan |

---

## Alur Data Per Modul

### Modul LPPD & LKPJ
```
[Admin input URL Google Drive]
  → Sistem validasi & simpan URL ke database
  → Tampil sebagai tombol "Akses Data Dukung" untuk publik
  → Klik tombol → user diarahkan ke Google Drive (tab baru)
```

### Modul EKK
```
[Admin input nilai komponen per kecamatan]
  → Sistem kalkulasi total skor
  → Sistem urutkan peringkat otomatis
  → Tabel ranking tampil real-time di halaman publik
```

### Modul Kerja Sama
```
[Admin input detail kerja sama baru]
  → Status awal: "Proses"
  → Admin update status → "Ditandatangani" atau "Selesai"
  → Timeline kerja sama tampil di halaman publik
```

### Peta Wilayah
```
[User pilih filter: Kabupaten / Kecamatan / Desa]
  → Sistem filter layer peta
  → Tampilan peta interaktif diperbarui (client-side)
```

### Galeri Dokumentasi
```
[Admin upload foto (JPG/PNG) atau paste URL YouTube]
  → Sistem kompres foto & generate thumbnail
  → Grid galeri foto + embed video tampil di halaman Dokumentasi
```

---

## Spesifikasi UI

### Halaman Sub Bagian
Gunakan **Card View** — tampilkan 3 kartu besar saat menu Sub Bagian diklik:
1. **Otonomi Daerah** — ikon dokumen, deskripsi singkat, warna biru
2. **Pemerintahan** — ikon bangunan, deskripsi singkat, warna hijau toska
3. **Kewilayahan** — ikon peta, deskripsi singkat, warna kuning/amber

Setelah salah satu kartu diklik, tampilkan **detail panel** di bawahnya (accordion atau halaman baru) berisi penjelasan modul dan tombol-tombol aksi.

### Tabel EKK
Tampilkan kolom: Peringkat, Nama Kecamatan, Skor (dengan progress bar), Nilai (A/B/C). Data dapat diurutkan (sortable).

### Navigasi Utama
Menu: `Beranda` | `Profil` | `Sub Bagian` | `Dokumentasi`

---

## Catatan Teknis

- Semua link eksternal (GDrive, BIG, SPM, YouTube) harus dibuka di **tab baru** (`target="_blank"`)
- URL yang disimpan admin harus divalidasi agar hanya menerima format URL yang valid
- Gambar galeri perlu dikompres otomatis untuk menjaga performa halaman
- Tidak ada fitur komentar atau interaksi pengguna selain filter peta
- Panel admin cukup sederhana — tidak perlu multi-level admin, satu akun admin sudah cukup

---

## Pertanyaan Klarifikasi untuk Developer

Sebelum mulai coding, pastikan jawaban dari pertanyaan berikut sudah tersedia:

1. **Stack teknologi** apa yang akan digunakan? (Laravel, Next.js, WordPress, dll.)
2. **Hosting** di mana? (server pemda, VPS, cloud?)
3. **Peta wilayah** menggunakan data dari mana? (GeoJSON lokal, Google Maps API, Leaflet?)
4. **Autentikasi admin** cukup dengan username/password, atau perlu SSO?
5. **Bahasa** website: hanya Bahasa Indonesia?