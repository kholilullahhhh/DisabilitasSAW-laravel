<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_obser_disabilitas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_warga');
            $table->integer('id_disabilitas');
            $table->integer('skor');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_obser_disabilitas');
    }
};
