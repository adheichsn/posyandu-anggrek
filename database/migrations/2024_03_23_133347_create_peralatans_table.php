<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeralatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peralatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peralatan');
            $table->integer('jumlah');
            $table->string('satuan')->nullable();
            $table->enum('status', ['bagus', 'rusak', 'rusak_sebagian', 'hilang', 'hilang_sebagian']);
            $table->date('tgl_pembelian');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('peralatans');
    }
}
