<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\user;
use Illuminate\Http\Request;
use App\Models\tb_berkas;
use App\Models\tb_ortu;
use App\Models\tb_biodata;
use App\Models\tb_agama;
use App\Models\tb_jenis_tinggal;
use App\Models\mode_transportasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;;

class DataOrtuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nisn)
    {
        $query = tb_ortu::where('nisn_ortu', $nisn)->first();
        
    //    $query = DB::table('users')
    //     ->join('tb_ortus', 'users.nisn', '=', 'tb_ortus.nisn_ortu')
    //     ->join('tb_pendidikans', 'tb_ortus.pendidikan_ayah', '=', 'tb_pendidikans.id')
    //     ->select('users.*', 'tb_ortus.*' , 'tb_pendidikans.*')
    //     ->where('users.nisn', '=', $nisn)
    //     ->first();
        
        return view('admin.main.data-ortu.show',compact('query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
