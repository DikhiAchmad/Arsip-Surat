<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Surat::insert([
            [
                'nomor_surat' => '2700/PD4/TU1/320',
                'kategori' => 'pemberitahuan',
                'judul' => 'terdapat vaksin gratis',
                'file_surat' => 'storage/file_surat/pertukaran makanan.pdf',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}