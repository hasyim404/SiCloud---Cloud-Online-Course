<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 3; $i++) {
            DB::table('modul')->insert([
                'jdl_modul' => uniqid('jdlModul_'),
                'course_id' => rand(1,4),
                'deskripsi' => uniqid('deskripsi_'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]);
        }
    }
}
