# Panduan Mengupdate CSS / Tampilan Tema Bricklet

Dokumen ini menjelaskan cara mengupdate gaya visual (CSS) dan kelas Tailwind di tema WordPress kustom **Bricklet**, terutama jika Anda mengalami kendala saat memperbarui gaya teks **"Find Your Dream Home Today"** di halaman depan.

---

## 1. Penyebab Umum Gaya (CSS) Tidak Terupdate

### A. Specificity (Kekuatan) Kelas Tailwind
Elemen judul "Find Your Dream Home Today" di berkas `front-page.php` memiliki kelas bawaan Tailwind:
```html
<h1 class="text-4xl lg:text-6xl font-bold text-white font-lexend text-center lg:text-left leading-tight ..." id="hero-headline">
```
Jika Anda mencoba menulis CSS kustom di berkas external `style.css` seperti:
```css
h1 {
  color: orange; /* INI TIDAK AKAN BEKERJA! */
}
```
Gaya di atas tidak akan berpengaruh karena kelas utilitas Tailwind (`text-white`) memiliki bobot kecocokan (specificity) yang lebih tinggi di browser.

**Solusinya (Pilih Salah Satu):**
1. **Cara Tailwind (Sangat Direkomendasikan):** Ubah langsung kelasnya di berkas `wp-content/themes/bricklet/front-page.php` pada baris ke-18.
   * *Contoh:* Ubah `text-white` menjadi `text-orange-500` (untuk warna oranye) atau `text-red-500` (untuk warna merah).
2. **Cara CSS Kustom (Menggunakan Id Selector):** Gunakan penargetan ID dengan tingkat kekuatan selector yang lebih tinggi di `<style>` tag `header.php` atau berkas `style.css`:
   ```css
   #hero-headline {
     color: #ea580c !important; /* Gunakan !important jika menimpa kelas utilitas */
   }
   ```

---

### B. Konfigurasi Compiler Tailwind CSS (CDN-based)
Tema ini memuat Tailwind CSS versi CDN di `header.php`:
```html
<script src="https://cdn.tailwindcss.com"></script>
```
Compiler CDN ini memindai kelas-kelas yang tertulis **langsung di dalam kode HTML/PHP** secara real-time saat halaman dimuat di browser.
* Jika Anda menulis kelas Tailwind baru langsung di tag HTML (misalnya menambahkan `bg-red-500` pada tombol), kelas tersebut akan **otomatis dikompilasi secara instan** oleh CDN.
* Namun, jika Anda menulis kelas Tailwind di dalam berkas CSS eksternal seperti `style.css` (misal: `@apply text-center;`), compiler CDN **tidak dapat mendeteksinya**. Tulis gaya CSS murni (seperti `text-align: center;`) jika mengedit di `style.css`.

---

### C. Efek Animasi & Transisi JavaScript
Judul utama memiliki kelas awal `opacity-0` dan `translate-y-10`.
Terdapat skrip JavaScript di `front-page.php` yang menghapus kelas tersebut setelah 2.5 detik (menyesuaikan durasi layar pemuatan/Loader):
```javascript
setTimeout(() => {
    const heroHeadline = document.getElementById("hero-headline");
    if (heroHeadline) {
        heroHeadline.classList.remove("opacity-0", "translate-y-10");
    }
}, 2500);
```
Jika Anda mengedit CSS transisi atau opasitas secara manual, pastikan logika di atas tidak mengintervensi atau menimpa modifikasi Anda.

---

### D. Cache Browser
Browser web sering menyimpan cache script dan file halaman untuk mempercepat waktu pemuatan. Jika Anda mengedit PHP/CSS dan tidak melihat perubahan:
1. Tekan tombol **`Cmd + Shift + R`** (Mac) atau **`Ctrl + F5`** (Windows) untuk melakukan pembersihan cache browser secara paksa (*Hard Reload*).
2. Atau, buka **Chrome Developer Tools (F12)** -> Masuk ke tab **Network** -> Centang pilihan **Disable Cache** (selama tab DevTools terbuka, browser tidak akan menyimpan cache halaman).

---

## 2. Cara Cepat Mengubah Teks "Find Your Dream Home Today"

Buka berkas **`wp-content/themes/bricklet/front-page.php`** dan cari kode berikut (sekitar baris ke-18):

```html
<!-- KODE SEBELUMNYA: -->
<h1 class="text-4xl lg:text-6xl font-bold text-white font-lexend text-center lg:text-left leading-tight transition-all duration-1000 transform opacity-0 translate-y-10" id="hero-headline">
    Find Your Dream Home Today
</h1>

<!-- CONTOH JIKA INGIN MENGUBAH WARNA MENJADI ORANYE DAN UKURAN LEBIH KECIL: -->
<h1 class="text-3xl lg:text-5xl font-bold text-orange-500 font-lexend text-center lg:text-left leading-tight transition-all duration-1000 transform opacity-0 translate-y-10" id="hero-headline">
    Temukan Rumah Impian Anda Hari Ini
</h1>
```
Cukup ubah kelas Tailwind langsung pada baris tersebut untuk melihat hasil perubahannya seketika!
