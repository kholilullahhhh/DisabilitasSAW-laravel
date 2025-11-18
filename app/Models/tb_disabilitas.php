<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_disabilitas extends Model
{
    use HasFactory;
    protected $table = 'tb_disabilitas';
    protected $fillable = [
        'kode',
        'kriteria',
        'ket',
        'poin'
    ];
}
