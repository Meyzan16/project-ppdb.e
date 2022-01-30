<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_ortu;
use App\Models\tb_berkas;
use App\Models\tb_biodata;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_user_siswa extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'nisn',
        'name',
        'password',
        'tahun_daftar',
        'status_lulus',
        'roles',
    ];


    protected $hidden = [
        'password'
    ];

    public function tb_biodata()
    {                                      
        return $this->hasOne(tb_biodata::class, 'user_biodata');
    }

    public function tb_ortu()
    {                                      
        return $this->hasOne(tb_ortu::class, 'user_ortu');
    }

    public function tb_berkas()
    {                                      
        return $this->hasOne(tb_berkas::class, 'user_berkas');
    }

}
