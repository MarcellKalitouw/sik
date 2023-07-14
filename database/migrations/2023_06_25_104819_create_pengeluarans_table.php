<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kategori');
            $table->uuid('id_gambar');
            $table->uuid('deleted_by');
            $table->string('nama', 250);
            $table->bigInteger('jumlah');
            $table->text('keterangan');
            $table->string('penanggung_jawab', 150);

            $table->softDeletes();
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
        Schema::dropIfExists('pengeluarans');
    }
}
