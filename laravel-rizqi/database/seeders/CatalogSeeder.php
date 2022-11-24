<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Agama'],
            ['nama' => 'Matematika'],
            ['nama' => 'Komik'],
            ['nama' => 'Bahasa']
        ];

        foreach ($data as $value) {
            Catalog::insert([
                'nama' => $value['nama'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
