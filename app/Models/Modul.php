<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;
    protected $table = 'modul';
    protected $fillable = ['jdl_modul','course_id','deskripsi'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function filemateri()
    {
        return $this->hasMany(Filemateri::class);
    }

    public function videomateri()
    {
        return $this->hasMany(Videomateri::class);
    }
}
