Langkah Langkah instalasi

1.Clone code dari github
2.Setup Database di .env
2.jalankan perintah ini
  composer require filament/filament -W   
  composer require filament/forms           
3.Buat Admin dengan menjalankan perintah ini
  php artisan make:filament-user
4.lalu buka aplikasi di localhost
5.tambahkan /petugas atau /pengunjung diakhir url tergantung halaman yang ingin dimasuki

(step 6-12 hanya untuk halaman petugas)
6.masukan email dan password sesuai yang tadi dibuat
7.setelah masuk di dashboard ada 2 pilihan (buku & pengunjung)
8.jika masuk ke salah satu halaman akan ada list dan tombol untuk tambah data
9.jika menekan tombol tambah akan diminta menginput data yang sesuai
10.jika ingin edit data bisa dilakukan dengan mengklik tombol edit di samping data dihalaman
11.jika ingin hapus bisa dengan mengselect data lalu dihapus
12.jika ingin logout bisa mengklik profile di kanan atas dan melakukan logout atau mengklik tombol logout di halaman dashboard

(step 13-19 hanya untuk halaman pengunjung )
13.kita bisa melakukan regis atau login di halaman pengunjung
14.jika melakukan regis, kita akan diminta untuk menginput nama, email, dan password
15.jika melakukan login, kita akan diminta untuk menginput nama, email, dan password
16.setelah masuk di dashboard ada 2 pilihan (daftar buku & peminjaman)
17.jika masuk ke halaman buku, hanya ada list buku tanpa ada tombol tambah,edit, atau hapus
18.lalu jika ingin meminjam kita bisa ke halaman peminjaman lalu menambah form peminjaman
19.jika ingin logout bisa mengklik profile di kanan atas dan melakukan logout atau mengklik tombol logout di halaman dashboard



