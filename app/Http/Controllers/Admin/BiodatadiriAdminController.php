<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\user;
use Illuminate\Http\Request;
use App\Models\tb_berkas;
use App\Models\tb_biodata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class BiodatadiriAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  $query = DB::table('users')
        ->join('tb_biodatas', 'users.nisn', '=', 'tb_biodatas.nisn_biodata')
        ->select('users.*', 'tb_biodatas.status_tb_biodata')
        ->get();
        return view('admin.main.biodata-diri.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $query = DB::table('users')
        ->join('tb_biodatas', 'users.nisn', '=', 'tb_biodatas.nisn_biodata')
        ->select('users.*', 'tb_biodatas.*')
        ->where('users.nisn', '=', $nisn)
        ->first();
        
        return view('admin.main.biodata-diri.show',compact('query'));
       
    }

    public function verifikasi($nisn){
        tb_biodata::where('nisn_biodata',$nisn)->update([
            'status_tb_biodata'    =>  'Y'
        ]);
        return redirect()->route('admin.biodata-diri.show', $nisn)->with(['success' =>  'Data Berhasil Di Verifikasi !!']);
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
