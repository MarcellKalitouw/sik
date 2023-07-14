<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan_keuangans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kategori');
            $table->uuid('id_gambar');
            $table->string('nama', 150);
            $table->bigInteger('jumlah');
            $table->string('from_to', 250);
            $table->text('keterangan');
            $table->enum('tipe', ['pengeluaran','pemasukkan']);

            $table->softDeletes();
            $table->uuid('deleted_by');
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
        Schema::dropIfExists('pencatatan_keuangans');
    }
}
