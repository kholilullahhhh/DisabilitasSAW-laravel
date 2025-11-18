<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kodepos extends Model
{
    use HasFactory;
    protected $table = 'tb_kodepos';
    protected $fillable = [
        'kodepos',
        'kecamatan',
        'distrik'
    ];

    public function warga()
    {
        return $this->hasMany(tb_warga::class, 'id_pos');
    }
}
