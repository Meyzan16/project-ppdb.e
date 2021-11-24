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
            $table->string('nisn_ortu',20)->unique()->nullable();
            $table->string('nik_ayah', 25)->unique()->nullable();
            $table->string('nama_ayah', 50)->nullable();
            $table->date('tgl_ayah')->nullable();
            $table->enum('pendidikan_ayah', ['Tidak sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'])->nullable();
            $table->enum('pekerjaan_ayah', ['Tidak bekerja','Nelayan','Petani','Peternak','PNS/TNI/POLRI','Karyawan Swasta','Pedagang Kecil','Wiraswasta','Wirausaha','Buruh','Pensiunan','Meninggal Dunia'])->nullable();
            $table->enum('penghasilan_bulanan_ayah', ['Kurang dari 500,000','500.000 - 999.9999','1 juta - 1.999.999 Juta','2 juta - 4.999.999 Juta','5 juta - 9.999.999 juta','10 juta - 19.999.999 juta','lebih dari 20 juta'])->nullable();

            $table->string('nik_ibu', 25)->unique()->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->date('tgl_ibu')->nullable();
            $table->enum('pendidikan_ibu', ['Tidak sekolah','Putus SD','SD Sederajat','SMP Sederajat','SMA Sederajat','D1','D2','D3','D4/S1','S2','S3'])->nullable();
            $table->enum('pekerjaan_ibu', ['Tidak bekerja','Nelayan','Petani','Peternak','PNS/TNI/POLRI','Karyawan Swasta','Pedagang Kecil','Wiraswasta','Wirausaha','Buruh','Pensiunan','Meninggal Dunia'])->nullable();
            $table->enum('penghasilan_bulanan_ibu', ['Kurang dari 500,000','500.000 - 999.9999','1 juta - 1.999.999 Juta','2 juta - 4.999.999 Juta','5 juta - 9.999.999 juta','10 juta - 19.999.999 juta','lebih dari 20 juta'])->nullable();
            $table->enum('status_ortu', ['Y','N','Belum Diverifikasi'])->default('Belum Diverifikasi');
            $table->softDeletes();
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
        Schema::dropIfExists('tb_ortus');
    }
}
