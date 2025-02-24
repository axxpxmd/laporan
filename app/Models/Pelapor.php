<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    protected $table = 'pelapor';
    protected $fillable = ['id', 'nama', 'jabatan'];
}
