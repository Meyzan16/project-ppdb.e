<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn_berkas',20)->unique()->nullable();
            $table->string('kartu_keluarga', 50)->nullable();
            $table->enum('status_kk', ['Y','N','Belum Diverifikasi'])->default('Belum Diverifikasi');
            $table->string('catatan_kk', 100)->nullable();

            // $table->string('ijazah', 50)->nullable();
            // $table->enum('status_ijazah', ['Y','N','Belum Diverifikasi'])->default('Belum Diverifikasi');
            // $table->string('catatan_ijazah', 100)->nullable();

            $table->string('file_nisn', 50)->nullable();
            $table->enum('status_file_nisn', ['Y','N','Belum Diverifikasi'])->default('Belum Diverifikasi');
            $table->string('catatan_nisn', 100)->nullable();

            $table->enum('status_akhir', ['Y','N','belum diverifikasi'])->default('belum diverifikasi');
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
        Schema::dropIfExists('tb_berkas');
    }
}
