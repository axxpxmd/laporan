<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    protected $table = 'deskripsi';
    protected $fillable = ['id', 'deskripsi', 'is_api'];
}
