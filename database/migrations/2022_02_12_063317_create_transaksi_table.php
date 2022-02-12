<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('NIK_pasien');
            $table->string('nama_pasien');
            $table->date('tanggal_lahir_pasien');
            $table->date('tanggal_pendaftaran');
            $table->text('keluhan');
            $table->integer('id_wilayah');
            $table->integer('id_tindakan');
            $table->integer('id_obat');
            $table->integer('total_biaya');
            $table->integer('update_by');
            $table->enum('status_transaksi', ['butuh_tindakan', 'butuh_pembayaran', 'Lunas/Selesai'])->default('butuh_tindakan');
            
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
        Schema::dropIfExists('transaksi');
    }
}
