<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mode_transportasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function tb_biodata(){
        return $this->hasMany(tb_biodata::class);
    
    }
}
