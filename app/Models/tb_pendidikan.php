<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tb_pendidikan extends Model
{
    use HasFactory;

    public function tb_ortu(){
        return $this->hasMany(tb_ortu::class);
    }



}
