<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_ortu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataBerkasSiswaController extends Controller
{

    public function edit($nisn){

        $query = DB::table('users')
        ->join('tb_berkas', 'users.nisn', '=', 'tb_berkas.nisn_berkas')
        ->join('tb_ortus', 'users.nisn', '=', 'tb_ortus.nisn_ortu')
        ->select('users.*', 'tb_berkas.*' , 'tb_ortus.*')
        ->where('users.nisn', '=', $nisn)
        ->first();
        
        return view('siswa.main.berkas.index', [
            'item' => $query
        ]); 

    }

}
