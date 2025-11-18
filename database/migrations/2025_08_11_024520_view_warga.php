<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW warga
            AS
            select
                tb_wargas.*,
                (select tb_kodepos.kecamatan FROM tb_kodepos WHERE tb_kodepos.id = tb_wargas.id_pos) as kecamatan,
                (select tb_kodepos.distrik FROM tb_kodepos WHERE tb_kodepos.id = tb_wargas.id_pos) as distrik,
                (SELECT if(COUNT(tb_obser_disabilitas.id_warga) > 0,'y','t') FROM tb_obser_disabilitas WHERE tb_obser_disabilitas.id_warga = tb_wargas.id) as jumlah
            FROM
                tb_wargas
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
