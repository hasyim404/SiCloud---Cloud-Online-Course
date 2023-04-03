<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 3; $i++) {
            DB::table('course')->insert([
                'nama_course' => uniqid('NamaCourse_'),
                'deskripsi_course' => uniqid('DeskripsiCourse_'),
                'foto' => null,
                'jdl_modul' => uniqid('NamaCourse_'),
                'deskripsi_modul' => uniqid('DeskripsiModul_'),
                'file_materi' => null,
                'video' => null,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]);
        }
    }
}
