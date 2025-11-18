<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_wargas', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_pos');
            $table->string('dusun', 64);
            $table->string('alamat', 128);
            $table->string('nama', 128);
            $table->string('tempat_lahir', 128);
            $table->dateTime('tgl_lahir');
            $table->enum('jk', ['l', 'p'])->default('l');
            $table->enum('agama', ['islam', 'kristen', 'katolik', 'budha', 'hindu', 'konghucu'])->default('islam');
            $table->string('nik', 16);
            $table->string('kk', 16);
            $table->string('ibu_kandung', 64);
            $table->string('ayah_kandung', 64);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_wargas');
    }
};
