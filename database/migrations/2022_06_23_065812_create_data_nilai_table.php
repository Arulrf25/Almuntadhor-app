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
            $table->String('pelajaran');
            $table->String('kelas');
            $table->String('tahun_ajar');
            $table->integer('kehadiran')->nullable();
            $table->integer('tugas')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
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
