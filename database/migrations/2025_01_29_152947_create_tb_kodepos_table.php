<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_kodepos', function (Blueprint $table) {
            $table->id();
            $table->string('kodepos',8);
            $table->string('kecamatan', 64);
            $table->string('distrik', 64);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tb_kodepos');
    }
};
