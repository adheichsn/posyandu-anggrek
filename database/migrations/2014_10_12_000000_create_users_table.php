<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('nik_ibu');
            $table->string('nik_anak');
            $table->string('nama_ibu');
            $table->string('nama_anak');
            $table->string('tgl_lahir');
            $table->string('usia');
            $table->enum('role', ['admin', 'user', 'bendahara', 'ketua_rt']);
            $table->enum('jenis_kelamin', ['laki_laki', 'perempuan']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
