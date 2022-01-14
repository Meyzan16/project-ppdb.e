<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_pendidikan;
use App\Models\User;

class tb_ortu extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    // protected $with = ['pendidikan_A', '0'];


    public function pendidikan_a(){
        return $this->belongsTo(tb_pendidikan::class, 'pendidikan_ayah');
    }

    public function pendidikan_i(){
        return $this->belongsTo(tb_pendidikan::class, 'pendidikan_ibu');
    }

    public function pekerjaan_a(){
        return $this->belongsTo(tb_pekerjaan::class, 'pekerjaan_ayah');
    }

    public function pekerjaan_i(){
        return $this->belongsTo(tb_pekerjaan::class, 'pekerjaan_ibu');
    }

    public function penghasilan_bulanan_a(){
        return $this->belongsTo(tb_penghasilan::class, 'penghasilan_bulanan_ayah');
    }

    public function penghasilan_bulanan_i(){
        return $this->belongsTo(tb_penghasilan::class, 'penghasilan_bulanan_ibu');
    }

   

    public function user(){
        return $this->belongsTo(user::class ,'user_ortu');
    }

    
}


