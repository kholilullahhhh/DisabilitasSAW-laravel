<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelObservasi extends Model
{
    use HasFactory;
    protected $table = 'tb_obser_disabilitas';
    protected $fillable = [
        'nama',
        'id_disabilitas',
        'kode',
        'poin',
    ];
}
