<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = ['nama_course','deskripsi_course','foto'];
    // protected $fillable = ['nama_course','deskripsi_course','foto','jdl_modul','deskripsi_modul','file_materi','video'];

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function modul()
    {
        return $this->hasMany(Modul::class);
    }
}
