<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $fillable = ['id', 'tanggal', 'bulan', 'tahun', 'hari', 'is_libur'];
}
