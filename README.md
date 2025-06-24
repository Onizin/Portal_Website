## Database Structure

Pada proyek ini saya menggunakan laragon, jika anda menggunakan xampp tools lainnya dapat digunakan, database dikonfigurasi pada file `.env` dengan nama sesuai variabel `DB_DATABASE`. Terdapat tiga tabel utama yang telah dibuat melalui migration, yaitu: `users`, `posts`, dan `comments`. Berikut penjelasan detail mengenai masing-masing tabel:

### 1. Tabel `users`

Tabel ini menyimpan data pengguna aplikasi. Struktur utamanya meliputi:

- **id**: Primary key, auto increment.
- **email**: Alamat email pengguna, unik.
- **username**: Nama pengguna, unik.
- **password**: Password terenkripsi.
- **firstname**: Nama depan pengguna.
- **lastname**: Nama belakang pengguna (nullable).
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan data.
- **deleted_at**: Timestamp untuk fitur soft delete (nullable).

**Catatan:**  
Token untuk autentikasi dan fitur "remember me" tidak disimpan langsung di tabel `users`, melainkan pada tabel khusus seperti `personal_access_tokens` untuk API token dan `remember_token` pada implementasi tertentu.

### 2. Tabel `posts`

Tabel ini berisi data postingan yang dibuat oleh pengguna. Struktur utamanya:

- **id**: Primary key, auto increment.
- **title**: Judul postingan.
- **image**: Nama file gambar postingan (nullable).
- **news_content**: Isi atau deskripsi postingan.
- **author**: Foreign key, relasi ke tabel `users` (pembuat postingan).
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan postingan.
- **deleted_at**: Timestamp untuk fitur soft delete (nullable).

### 3. Tabel `comments`

Tabel ini menyimpan komentar pada setiap postingan. Struktur utamanya:

- **id**: Primary key, auto increment.
- **post_id**: Foreign key, relasi ke tabel `posts` (post yang dikomentari).
- **user_id**: Foreign key, relasi ke tabel `users` (pemberi komentar).
- **comment_content**: Isi komentar.
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan komentar.
- **deleted_at**: Timestamp untuk fitur soft delete (nullable).

---

**Tabel lain** seperti `personal_access_tokens`, `password_reset_tokens`, dan `failed_jobs` digunakan untuk kebutuhan autentikasi, reset password, dan pencatatan job yang gagal, namun tidak menjadi bagian utama dari struktur data aplikasi.

Dengan struktur ini, aplikasi dapat mengelola data pengguna, postingan, dan komentar secara terintegrasi serta menjaga relasi antar data dengan baik.

### Penjelasan Tentang Controller

Controller adalah komponen dalam arsitektur aplikasi yang berfungsi sebagai pengatur alur data antara model (basis data) dan view (antarmuka pengguna atau response API). Pada aplikasi ini, controller bertanggung jawab untuk menerima permintaan (request) dari pengguna, memproses logika bisnis yang diperlukan, serta menentukan data apa yang akan dikirimkan kembali sebagai respons. Fungsi-fungsi pada controller biasanya mencakup pembuatan data (create), pengambilan data (read), pembaruan data (update), dan penghapusan data (delete) untuk setiap entitas seperti pengguna, postingan, dan komentar. Dengan demikian, controller memastikan setiap permintaan diproses sesuai aturan dan kebutuhan aplikasi.

#### Daftar Controller dan Fungsinya

1. **AuthenticationController**
   - **login**: Melakukan autentikasi user berdasarkan email dan password, serta menghasilkan token akses jika berhasil login.
   - **logout**: Menghapus token akses saat user logout.
   - **me**: Mengambil data user yang sedang login (autentikasi).

2. **PostController**
   - **index**: Menampilkan daftar semua postingan beserta relasi penulis dan komentar.
   - **show**: Menampilkan detail satu postingan beserta penulis dan komentar.
   - **show2**: Menampilkan detail satu postingan tanpa relasi tambahan.
   - **store**: Membuat postingan baru, termasuk upload gambar jika ada.
   - **update**: Memperbarui data postingan berdasarkan ID.
   - **destroy**: Menghapus postingan (soft delete).
   - **generateRandomString**: Membuat nama acak untuk file gambar yang diunggah.

3. **CommentController**
   - **store**: Menambah komentar baru pada postingan tertentu.
   - **update**: Memperbarui isi komentar berdasarkan ID.
   - **destroy**: Menghapus komentar (soft delete).

Setiap controller menangani proses CRUD (Create, Read, Update, Delete) sesuai entitasnya dan sudah menggunakan validasi data serta autentikasi sesuai kebutuhan aplikasi.

### Penggunaan Postman untuk Konfigurasi API

Postman adalah alat bantu yang digunakan untuk menguji dan mengonfigurasi endpoint API secara interaktif.