<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_biodatas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn_biodata',20)->unique()->nullable();
            $table->enum('jenkel', ['L','P'])->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jml_sdr_kdg',5)->nullable();
            $table->string('anak_keberapa',2)->nullable();
            $table->enum('agama', ['Islam','Kristen/ Protestan','Katholik','Hindu','Budha','Khonghucu'])->nullable();
            $table->string('no_akte', 50)->nullable();
            $table->enum('Status_kewarganegaraan', ['WNI', 'WNA'])->nullable();
            $table->string('negara_wna', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('nama_dusun',50)->nullable();
            $table->string('kelurahan_desa',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('kode_pos',20)->nullable();
            $table->enum('jenis_tinggal', ['Bersama orang tua','Wali','Kos','Asrama','Panti Asuhan'])->nullable();
            $table->enum('mode_transportasi', ['Jalan kaki','Kendaraan pribadi','Kendaraan Umum/angkot','Jemputan Sekolah','Ojek','Andong/Bendi/Sado/ Dokar/Delman/Beca','Perahu penyebrangan/Rakit/Getek'])->nullable();
            $table->enum('status_KKS', ['Y','N'])->nullable();
            $table->string('nomor_kks',50)->nullable();
            $table->string('no_hp',15)->nullable();
            $table->enum('status_KPS_PKH', ['Y','N'])->nullable();
            $table->string('nomor_KPS_PKH',50)->nullable();
            $table->enum('status_kip', ['Y','N'])->nullable();
            $table->string('nomor_kip',50)->nullable();
            $table->string('nama_kip',50)->nullable();
            $table->string('berat_badan',5)->nullable();
            $table->string('tinggi_badan',5)->nullable();
            $table->string('jarak_rumah_sekolah',20)->nullable();
            $table->string('waktu_tempuh',20)->nullable();
          
            $table->enum('status_tb_biodata', ['Y','N','Belum Diverifikasi'])->default('Belum Diverifikasi');
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
        Schema::dropIfExists('tb_biodatas');
    }
}