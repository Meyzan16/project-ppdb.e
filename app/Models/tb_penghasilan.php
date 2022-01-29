<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\tb_penghasilan;

class tb_penghasilan extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama'
    ];
    public function tb_ortu(){
        return $this->hasMany(tb_ortu::class);
    }
}
