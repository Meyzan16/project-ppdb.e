<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_ortu;
use App\Models\user;
use App\Models\tb_pekerjaan;
use App\Models\tb_pendidikan;
use App\Models\tb_penghasilan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataOrtuSiswaController extends Controller
{
   

    public function edit($nisn)
    {
        $pekerjaan = tb_pekerjaan::all();
        $penghasilan = tb_penghasilan::all();
        $pendidikan = tb_pendidikan::all();
        $pendidikan_ibu = tb_pendidikan::all();
        $pekerjaan_ibu = tb_pekerjaan::all();
        $penghasilan_ibu = tb_penghasilan::all();

        $item = User::where('nisn', session()->get('nisn'))->first();
        
        return view('siswa.main.dataortu.index', compact('item', 'pekerjaan' ,'penghasilan' , 'pendidikan', 'pekerjaan_ibu','penghasilan_ibu' ,'pendidikan_ibu' )); 
    }

    public function update(Request $request, $nisn)
    {
        
        // pasang rules
        $rules = [
            'nik_ayah' =>'required|numeric|digits:16||unique:tb_ortus',
            'nama_ayah' => 'required',
            'tgl_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_bulanan_ayah' => 'required',

            'nik_ibu' =>'required|numeric|digits:16|unique:tb_ortus',
            'nama_ibu' => 'required',
            'tgl_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_bulanan_ibu' => 'required',
           

        ];

        //pasang pesan kesalahan
        $messages = [
            'nik_ayah.required' => 'Form nik ayah tidak boleh kosong',
            'nik_ayah.digits' => 'Form nik ayah wajib 16 digit',
            'nik_ayah.numeric' => 'Form nik ayah bersifat angka',
            'nik_ayah.unique' => 'Nik ayah sudah terdaftar',
            'nama_ayah.required' => 'Form nama ayah tidak boleh kosong',
            'tgl_ayah.required' => 'Form tanggal lahir ayah tidak boleh kosong',
            'pendidikan_ayah.required' => 'Form pendidikan ayah tidak boleh kosong',
            'pekerjaan_ayah.required' => 'Form pekerjaan ayah tidak boleh kosong',
            'penghasilan_bulanan_ayah.required' => 'Form penghasilan ayah tidak boleh kosong',

            'nik_ibu.required' => 'Form nik ibu tidak boleh kosong',
            'nik_ibu.numeric' => 'Form nik ibu bersifat angka',
            'nik_ibu.digits' => 'Form nik ibu wajib 16 digit',
            'nik_ibu.unique' => 'Nik ibu sudah terdaftar',
            'nama_ibu.required' => 'Form nama ibu tidak boleh kosong',
            'tgl_ibu.required' => 'Form tanggal lahir ibu tidak boleh kosong',
            'pendidikan_ibu.required' => 'Form pendidikan ibu tidak boleh kosong',
            'pekerjaan_ibu.required' => 'Form pekerjaan ibu tidak boleh kosong',
            'penghasilan_bulanan_ibu.required' => 'Form penghasilan ibu tidak boleh kosong',
            
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
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


        return \redirect()->route('data-ortu.edit', $nisn)->with('success', 'biodata pribadi berhasil diperbarui, silahkan lengkap biodata berikutnya');

    }

}
