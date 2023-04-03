<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaUsers extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['f_name','l_name','no_telp','username','email','password','status','foto','role'];
}
