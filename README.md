# LabUasWeb
1. Manajemen Database (phpMyAdmin)
   sistem menggunakan database MySQL bernama db_perpustakaan.
![404a6c24-6b75-4649-af5f-983877e4b105](https://github.com/user-attachments/assets/da218d6d-8a17-4be9-a594-e2a16be1161d)
2. Sistem Autentikasi (Login Multi-Role)
<img width="1919" height="1079" alt="Cuplikan layar 2026-01-05 212223" src="https://github.com/user-attachments/assets/d75ea997-f1ad-49af-897f-5e302ea0bbb7" />

- Keamanan Role: Sistem secara otomatis membedakan hak akses berdasarkan data di database.

- Identitas Pengguna: Setelah berhasil masuk, nama pengguna dan rolenya akan muncul di bagian navbar (pojok kanan atas).

3. Dashboard Utama (Read & Pagination)
<img width="1920" height="1080" alt="Cuplikan layar 2026-01-07 173419" src="https://github.com/user-attachments/assets/cd6701c3-0690-4049-a3f6-2bce01d584b6" />

- Penyajian Data: Menampilkan koleksi buku dalam bentuk tabel yang bersih.

- Pagination: jika data melebihi 5 baris, sistem secara otomatis membaginya ke halaman berikutnya (seperti angka 1 dan 2 di bawah tabel) untuk menjaga kecepatan load halaman.

- Fitur Pencarian: Kolom pencarian di atas tabel memungkinkan pengguna mencari buku berdasarkan judul atau penulis secara spesifik.


4. Manajemen Data (CRUD oleh Admin)
   
- tombol-tombol manajemen data hanya muncul jika login sebagai admin:

- Tambah Buku: Tombol hijau di dashboard yang mengarah ke formulir input buku baru.

- Edit & Hapus: Tombol kuning dan merah di setiap baris data untuk melakukan pembaruan atau penghapusan buku tertentu.

5. Desain Responsif (Mobile First)
   seluruh tampilan dibangun menggunakan Twitter Bootstrap. Ini memastikan bahwa menu dan tabel tetap rapi meskipun diakses melalui layar smartphone yang kecil.
