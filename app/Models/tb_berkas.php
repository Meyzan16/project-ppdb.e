<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class tb_berkas extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(user::class ,'user_berkas');
    }
}
