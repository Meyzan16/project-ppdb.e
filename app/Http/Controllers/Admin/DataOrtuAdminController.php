<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\user;
use Illuminate\Http\Request;
use App\Models\tb_berkas;
use App\Models\tb_ortu;
use App\Models\tb_biodata;
use App\Models\tb_pendidikan;
use App\Models\tb_penghasilan;
use App\Models\tb_pekerjaan;
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
        return view('admin.main.data-ortu.show',compact('query'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $pendidikan =  tb_pendidikan::all();
        $pekerjaan = tb_pekerjaan::all();
        $penghasilan = tb_penghasilan::all();

        $query = tb_ortu::where('nisn_ortu', $nisn)->first();        
        return view('admin.main.data-ortu.edit',compact('query', 'pendidikan','pekerjaan','penghasilan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {   
        $query = tb_ortu::where('nisn_ortu', $nisn)->first();

        $rules = [
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
        ];

        if($request->nik_ayah != $query->nik_ayah){
            $rules['nik_ayah'] = 'required|numeric|digits:16|unique:tb_ortus';
        }

        if($request->nik_ibu != $query->nik_ibu){
            $rules['nik_ibu'] = 'required|numeric|digits:16|unique:tb_ortus';
        }

        $messages = [
            'nama_ayah.required'     => 'form nama ayah tidak boleh kosong',
            'nama_ibu.required'     => 'form nama ibu tidak boleh kosong',
            'nik_ayah.required'     => 'form nik ayah tidak boleh kosong',
            'nik_ayah.numeric'     => 'form nik ayah bersifat angka',
            'nik_ayah.digits'     => 'form nik ayah wajib 16 karakter',
            'nik_ayah.unique'     => 'form nik ayah sudah terdaftar',


           'nik_ibu.required'     => 'form nik ibu tidak boleh kosong',
            'nik_ibu.numeric'     => 'form nik ibu bersifat angka',
            'nik_ibu.digits'     => 'form nik ibu wajib 16 karakter',
            'nik_ibu.unique'     => 'form nik ibu sudah terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules , $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        tb_ortu::where('nisn_ortu', $nisn)->update([
            'nik_ayah' => $request->nik_ayah,
            'nama_ayah' => $request->nama_ayah,
            'tgl_ayah' => $request->tgl_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_bulanan_ayah' => $request->penghasilan_bulanan_ayah,

            'nik_ibu' => $request->nik_ibu,
            'nama_ibu' => $request->nama_ibu,
            'tgl_ibu' => $request->tgl_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_bulanan_ibu' => $request->penghasilan_bulanan_ibu,
        ]);

        return \redirect()->route('admin.data-ortu.edit', $request->nisn)->with('success', 'Data orang tua berhasil diperbarui');

    }

    public function verifikasi($nisn){
        tb_ortu::where('nisn_ortu',$nisn)->update([
            'catatan_ortu'   => NULL,
            'status_ortu'    =>  'Y'
        ]);
        return redirect()->route('admin.data-ortu.show', $nisn)->with(['success' =>  'Data Berhasil Di Verifikasi !!']);
    }

    public function verifikasi_tolak(Request $request, $nisn){

        tb_ortu::where('nisn_ortu',$nisn)->update([
            'catatan_ortu'   => $request->catatan_ortu,
            'status_ortu'    =>  'N'
        ]);
        return redirect()->route('admin.data-ortu.show', $nisn)->with(['success_tolak' =>  'Data Berhasil Di Verifikasi !!']);
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
