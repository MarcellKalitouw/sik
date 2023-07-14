<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukkans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kategori');
            $table->uuid('id_gambar');
            $table->uuid('deleted_by');
            $table->string('nama', 150);
            $table->bigInteger('jumlah');
            $table->string('sumber_dana', 250);
            $table->text('keterangan');

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
        Schema::dropIfExists('pemasukkans');
    }
}
