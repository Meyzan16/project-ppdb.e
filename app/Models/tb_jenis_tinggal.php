<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tb_jenis_tinggal extends Model
{
    use HasFactory;

    public function tb_biodata(){
        return $this->hasMany(tb_biodata::class);
    
    }
}
