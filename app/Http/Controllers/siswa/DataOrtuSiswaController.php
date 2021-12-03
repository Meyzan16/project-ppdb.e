<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_biodata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataOrtuSiswaController extends Controller
{
   

    public function edit($nisn)
    {
        $query = DB::table('users')
        ->join('tb_ortus', 'users.nisn', '=', 'tb_ortus.nisn_ortu')
        ->select('users.*', 'tb_ortus.*')
        ->where('users.nisn', '=', $nisn)
        ->first();
        
        return view('siswa.main.dataortu.index', [
            'item' => $query
        ]); 
    }

    public function update(Request $request, $id)
    {
        //
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
