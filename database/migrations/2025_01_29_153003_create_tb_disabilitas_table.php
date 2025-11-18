<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 255);
            $table->string('kriteria',255);
            $table->string('ket');
            $table->integer('poin');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_disabilitas');
    }
};
