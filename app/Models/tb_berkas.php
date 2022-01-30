<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_user_siswa;


class tb_berkas extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(tb_user_siswa::class ,'user_berkas');
    }
}
