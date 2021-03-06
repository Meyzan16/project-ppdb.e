<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbOrtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ortus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_ortu')->nullable();
            $table->string('nisn_ortu',20)->unique()->nullable();
            $table->string('nik_ayah', 25)->unique()->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->date('tgl_ayah')->nullable();
            $table->foreignId('pendidikan_ayah')->nullable();
            $table->foreignId('pekerjaan_ayah')->nullable();
            $table->foreignId('penghasilan_bulanan_ayah')->nullable();
           

            $table->string('nik_ibu', 25)->unique()->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->date('tgl_ibu')->nullable();
            $table->foreignId('pendidikan_ibu')->nullable();
            $table->foreignId('pekerjaan_ibu')->nullable();
            $table->foreignId('penghasilan_bulanan_ibu')->nullable();
            $table->text('catatan_ortu')->nullable();
            $table->enum('status_ortu', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
            $table->foreignId('id_verifikasi_ortu')->nullable();
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
        Schema::dropIfExists('tb_ortus');
    }
}
