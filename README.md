# Laravel Filament Multi Role Menggunakan Spatie

Deskripsi singkat proyek ini di sini. Jelaskan secara singkat apa yang Anda coba capai dengan proyek ini dan mengapa ini penting.

## Prasyarat

Sebelum Anda memulai dengan proyek ini, pastikan Anda memiliki prasyarat berikut:

- [Laravel 10](https://laravel.com/docs/10.x)
- [Filament 3](https://filamentapp.com/)
- [Spatie Permission](https://spatie.be/docs/laravel-permission)

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal proyek ini:

1. Clone repositori ini ke komputer Anda:
   ```bash
   git clone https://github.com/username/nama-repo.git

2. Pindah ke direktori proyek:
    ```bash
    cd nama-repo

3. Salin file `.env.example` menjadi `.env` dan sesuaikan dengan pengaturan Anda:
    ```bash
    cp .env.example .env
    ```

4. Jalankan perintah berikut untuk menginstal semua dependensi:
    ```bash
    composer install
    ```

5. Jalankan migrasi dan isi database:
    ```bash
    php artisan migrate --seed
    ```

6. Terakhir, jalankan server pengembangan:
    ```bash
    php artisan serve
    ```


## Penggunaan

### Membuat User Admin

Untuk membuat user admin, jalankan perintah berikut untuk memproses data pengisian awal:

```bash
php artisan db:seed --class=NamaSeeder
```

Ini akan membuat user admin dengan informasi login berikut:

- Email: admin@gmail.com
- Password: password

##Mengakses Area Admin
Setelah membuat user admin, Anda dapat mengakses area admin dengan mengunjungi URL berikut:
```bash
http://127.0.0.1:8000/admin/users
```


Pastikan Anda menggunakan informasi login yang sesuai untuk mengakses area admin.

##Menambahkan Model Baru
Untuk membuat model atau resource baru silahkan ikut langkah-langkah berikut:
1. Buat Model  dan Migration
    ```bash
    php artisan make:model NamaModel -m
    ```

2. Migrasi
    ```bash
    php artisan migrate
    ```

3. Buat resource Filament
    ```bash
    php artisan make:filament-resource NamaModelResource
    ```

4. Untuk melakukan direct setelah buat data baru silahkan insert ini pada CreateResource
    ```php
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    ```

## Untuk Setting Agar Bisa ditampilkan pada role tertentu
1. Buat Policy
    ```bash
    php artisan make:policy NamaModelPolicy --model=NamaModel
    ```
2. Setting `Policies/NamaModelPolicy.php`
    pada fungsi `viewAny`,`create`,`update`,`delete` tambahkan ini
    ```bash
    return $user->hasRole('Admin'); //single role
    return $user->hasRole(['Admin','User']); //multiple role
    ```
3. 

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buka [CONTRIBUTING.md](CONTRIBUTING.md) untuk panduan kontribusi.

## Lisensi

Proyek ini dilisensikan di bawah lisensi [nama-lisensi](LICENSE.md).

## Kontak

Jika Anda memiliki pertanyaan atau masalah terkait proyek ini, silakan hubungi [nama-anda](https://github.com/nama-anda).

## Pengakuan

Terima kasih kepada [Spatie](https://spatie.be/) dan komunitas Laravel dan Filament atas dukungan dan inspirasi mereka.


