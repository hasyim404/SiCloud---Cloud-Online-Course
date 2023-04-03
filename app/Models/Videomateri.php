<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videomateri extends Model
{
    use HasFactory;
    protected $table = 'videomateri';
    protected $fillable = ['nama_video','video','modul_id'];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
