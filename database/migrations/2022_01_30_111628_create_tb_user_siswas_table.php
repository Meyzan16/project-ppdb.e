<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUserSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_user_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn',20)->unique()->nullable();
            $table->string('nik', 25)->unique()->nullable();
            $table->string('name', 50)->nullable();
            $table->string('email', 100)->unique()->nullable();
            $table->string('username', 50)->nullable();
            $table->string('password', 100)->nullable();
            $table->year('tahun_daftar')->nullable();
            $table->enum('status_lulus', ['Y', 'N'])->default('N');
            $table->year('tahun_lulus')->nullable();
            $table->enum('roles', ['SISWA', 'ALUMNI'])->nullable();
            $table->softDeletes();
            $table->foreignId('id_verifikasi_softdelete')->nullable();
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
        Schema::dropIfExists('tb_user_siswas');
    }
}
