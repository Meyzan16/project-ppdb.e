<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tb_ortu;
use App\Models\User;

class tb_biodata extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillabel = [

    ];

    public function user(){
        return $this->belongsTo(user::class ,'user_biodata');
    }


}
