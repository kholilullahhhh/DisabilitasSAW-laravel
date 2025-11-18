<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_obser_disabilitas extends Model
{
    use HasFactory;
    protected $table = 'tb_obser_disabilitas';
    protected $fillable = [
        'id_warga',
        'id_disabilitas',
        'skor',
    ];
    
}
