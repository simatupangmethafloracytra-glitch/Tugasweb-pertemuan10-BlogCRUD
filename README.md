# TugasWeb-P10-BlogCRUD

Tugas Rutin 10: Blog CRUD dengan Laravel. Fitur: resource route, validasi per field, flash message, Blade component (Alert dan Card), Route Model Binding, pagination, dan bonus pencarian.

## Persyaratan
PHP 8.2+, Composer, MySQL (XAMPP), phpMyAdmin.

## Langkah instalasi

1. Buat project: `composer create-project laravel/laravel TugasWeb-P10-BlogCRUD`
2. Buat database `tugasweb_p10` di phpMyAdmin, lalu atur `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tugasweb_p10
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Generate file: `php artisan make:model Post` dan `php artisan make:controller PostController --resource --model=Post`
4. Salin migration, model, controller, seeder, route, dan view dari repo ini.
5. Migrasi dan isi data contoh: `php artisan migrate` lalu `php artisan db:seed --class=PostSeeder`
6. Jalankan: `php artisan serve`, buka `http://127.0.0.1:8000`

## Route (php artisan route:list)

| Method | URL | Nama route | Method controller |
|---|---|---|---|
| GET | /posts | posts.index | index |
| GET | /posts/create | posts.create | create |
| POST | /posts | posts.store | store |
| GET | /posts/{post} | posts.show | show |
| GET | /posts/{post}/edit | posts.edit | edit |
| PUT/PATCH | /posts/{post} | posts.update | update |
| DELETE | /posts/{post} | posts.destroy | destroy |

## Struktur penting

| File | Fungsi |
|---|---|
| `routes/web.php` | `Route::resource('posts', ...)` |
| `app/Http/Controllers/PostController.php` | 7 method CRUD, validasi, flash message |
| `app/Models/Post.php` | Model Eloquent |
| `resources/views/layouts/app.blade.php` | Layout master (`@yield`) |
| `resources/views/components/` | Component `alert` dan `card` |
| `resources/views/posts/` | View index, create, edit, show, dan form bersama |
| `database/migrations/` | Skema tabel `posts` |
| `database/seeders/PostSeeder.php` | 15 data contoh |

## Screenshot
Lihat folder `screenshots/`.
