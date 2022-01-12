<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_berkas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataBerkasSiswaController extends Controller
{

    public function edit($nisn){

        $query = User::where('nisn', session()->get('nisn'))->first();
        
        return view('siswa.main.berkas.index', [
            'item' => $query
        ]); 
    }

    public function update(Request $request, $nisn){

        //atur env FILESYSTEM_DRIVER=public agar bisa diakses secara public
        $rules = [
            'kartu_keluarga'=> 'required|mimes:pdf|max:2048',
        ];

        //pasang pesan kesalahan
        $messages = [
            'kartu_keluarga.required'     => 'Kartu keluarga wajib di isi',
            'kartu_keluarga.max'     => 'File Kartu keluarga Maksimal 2 MB ',
            'kartu_keluarga.mimes'     => 'File Kartu keluarga Bersifat PDF'
        ];

        $data = $request->all();
        $validator = Validator::make($request->all(), $rules, $messages);
        
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        if($request->file('kartu_keluarga')){
            $data['kartu_keluarga'] = date('now').'-'.$nisn.'.'.$request->kartu_keluarga->getClientOriginalExtension(); 
            $request->kartu_keluarga->move(public_path('/upload/kartu-keluarga/'), $data['kartu_keluarga']);
        }

        tb_berkas::where('nisn_berkas', $nisn)->update([
            'kartu_keluarga' => $data['kartu_keluarga']
        ]);

        return \redirect()->route('biodata-diri')->with('success', 'Data berkas berhasil diperbarui, mohon menunggu sampai data diverifikasi');



    }

}
