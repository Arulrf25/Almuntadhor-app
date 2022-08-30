<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilai', function (Blueprint $table) {
            $table->id();
            $table->String('nis');
            $table->String('nama');
            $table->String('pelajaran');
            $table->String('kelas');
            $table->String('tahun_ajar');
            $table->floatval('kehadiran')->nullable();
            $table->floatval('tugas')->nullable();
            $table->floatval('uts')->nullable();
            $table->floatval('uas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_nilai');
    }
}
