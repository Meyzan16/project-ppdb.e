<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_ortu;
use App\Models\User;
use App\Models\tb_jenis_tinggal;
use App\Models\mode_transportasi;

class tb_biodata extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillabel = [

    ];

    public function user(){
        return $this->belongsTo(user::class ,'user_biodata');
    }

    public function tb_agama(){
        return $this->belongsTo(tb_agama::class, 'agama_id');
    }

    public function tb_jenis_tinggal(){
        return $this->belongsTo(tb_jenis_tinggal::class, 'jenis_tinggal');
    }

    public function transportasi(){
        return $this->belongsTo(mode_transportasi::class, 'mode_transportasi');
    }


}
