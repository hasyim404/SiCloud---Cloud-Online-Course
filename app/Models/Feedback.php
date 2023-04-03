<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
    protected $fillable = ['nama','email','isi_feedback','course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
