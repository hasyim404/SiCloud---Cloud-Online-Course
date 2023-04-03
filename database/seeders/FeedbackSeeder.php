<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 5; $i++) {
            DB::table('feedback')->insert([
                'nama' => uniqid('feedback_'),
                'email' => uniqid().'@gmail.com',
                'isi_feedback' => uniqid('isi_'),
                'course_id' => rand(1, 10),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ]);
        }
    }
}
