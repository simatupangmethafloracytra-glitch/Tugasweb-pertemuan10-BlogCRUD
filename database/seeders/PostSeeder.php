<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    // Jalankan: php artisan db:seed --class=PostSeeder
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Post::create([
                'title' => "Contoh artikel blog ke-$i",
                'body'  => "Ini isi contoh artikel nomor $i. Data ini dibuat oleh seeder agar fitur pagination dan pencarian bisa dicoba.",
            ]);
        }
    }
}
