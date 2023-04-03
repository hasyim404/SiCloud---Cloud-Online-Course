<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filemateri extends Model
{
    use HasFactory;
    protected $table = 'filemateri';
    protected $fillable = ['pdfmateri','modul_id'];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
