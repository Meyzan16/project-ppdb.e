<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\tb_ortu;
use App\Models\tb_berkas;
use App\Models\tb_biodata;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function tb_biodata()
    {                                      //primarykey    //foreignkey
        return $this->belongsTo(tb_biodata::class, 'id' , 'nisn_biodata');
    }

    public function tb_ortu()
    {                                      //primarykey    //foreignkey
        return $this->belongsTo(tb_ortu::class, 'id' , 'nisn_ortu');
    }

    public function tb_berkas()
    {                                      //primarykey    //foreignkey
        return $this->belongsTo(tb_berkas::class, 'id' , 'nisn_berkas');
    }


    

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

   
}
