## Database Structure

Pada proyek ini, database yang digunakan telah dikonfigurasi pada file `.env` dengan nama database sesuai variabel `DB_DATABASE`. Terdapat tiga tabel utama yang telah dibuat melalui migration, yaitu: `users`, `posts`, dan `comments`. Berikut penjelasan detail mengenai masing-masing tabel:

### 1. Tabel `users`

Tabel ini menyimpan data pengguna aplikasi. Struktur umumnya meliputi:

- **id**: Primary key, auto increment.
- **name**: Nama lengkap pengguna.
- **email**: Alamat email pengguna, unik.
- **email_verified_at**: Waktu verifikasi email (nullable).
- **password**: Password terenkripsi.
- **remember_token**: Token untuk fitur "remember me" (nullable).
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan data.

### 2. Tabel `posts`

Tabel ini berisi data postingan yang dibuat oleh pengguna. Struktur utamanya:

- **id**: Primary key, auto increment.
- **user_id**: Foreign key, relasi ke tabel `users` (pembuat postingan).
- **title**: Judul postingan.
- **content**: Isi atau deskripsi postingan.
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan postingan.

### 3. Tabel `comments`

Tabel ini menyimpan komentar yang diberikan pada setiap postingan. Struktur utamanya:

- **id**: Primary key, auto increment.
- **post_id**: Foreign key, relasi ke tabel `posts` (post yang dikomentari).
- **user_id**: Foreign key, relasi ke tabel `users` (pemberi komentar).
- **content**: Isi komentar.
- **created_at** dan **updated_at**: Timestamp pencatatan waktu pembuatan dan pembaruan komentar.

Dengan struktur ini, aplikasi dapat mengelola data pengguna, postingan, dan komentar secara terintegrasi serta menjaga relasi antar data dengan baik.
