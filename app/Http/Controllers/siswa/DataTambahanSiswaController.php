<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_biodata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataTambahanSiswaController extends Controller
{


    public function update(Request $request, $nisn)
    {

        // pasang rules
        $rules = [
            'jenkel' =>'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jml_sdr_kdg' => 'required|max:2',
            'anak_keberapa' => 'required|max:2',
            'agama_id' => 'required',
            'no_akte' => 'required|max:30|unique:tb_biodatas',
            'is_kewarganegaraan' => 'required',
            'alamat' =>'required',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'nama_dusun' => 'required|max:50',
            'kelurahan_desa' => 'required|max:50',
            'kecamatan' => 'required|max:50',
            'kode_pos' => 'required|numeric',

            'negara_wna' => 'nullable',

            'jenis_tinggal' => 'required',
            'mode_transportasi' => 'required',
            'no_hp' => 'required|numeric',

            'nomor_kks'=> 'nullable|unique:tb_biodatas',

            'nomor_KPS_PKH'=> 'nullable|unique:tb_biodatas', 

            'nomor_kip'=> 'nullable|unique:tb_biodatas',
            'nama_kip'=> 'nullable|max:50',
            
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'jarak_rumah_sekolah' => 'required',
            'waktu_tempuh' => 'required',

        ];

        //pasang pesan kesalahan
        $messages = [
            'jenkel.required' => 'Form jenis kelamin tidak boleh kosong',
            'tempat_lahir.required' => 'Form tempat lahir tidak boleh kosong',
            'tgl_lahir.required' => 'Form tanggal lahir tidak boleh kosong',
            'jml_sdr_kdg.required' => 'Form jumlah saudata kandung tidak boleh kosong',
            'jml_sdr_kdg.max'     => 'panjang form jumlah saudara kandung maksimal 2 karakter',
            'anak_keberapa.required' => 'Form anak keberapa tidak boleh kosong',
            'anak_keberapa.max'     => 'panjang form anak keberapa maksimal 2 karakter',
            'agama.required' => 'Form agama tidak boleh kosong',
            'no_akte.required' => 'Form no akte tidak boleh kosong',
            'no_akte.max' => 'panjang form no akte maksimal 30 karakter ',
            'no_akte.unique'     => 'nomor akte sudah terdaftar',
            
            'rt.digits' => 'panjang form RT maksimal 2 karakter ',
            'rw.digits' => 'panjang form RW maksimal 2 karakter ',

            'alamat.required' => 'Form alamat tidak boleh kosong',

            'nama_dusun.required' => 'Form nama dusun tidak boleh kosong',
            'nama_dusun.max' => 'panjang form nama dusun maksimal 50 karakter ',

            'kelurahan_desa.required' => 'Form kelurahan/desa tidak boleh kosong',
            'kelurahan_desa.max' => 'panjang form kelurahan/desa maksimal 50 karakter ',

            'kecamatan.required' => 'Form kecamatan tidak boleh kosong',
            'kecamatan.max' => 'panjang form kecamatan maksimal 50 karakter ',

            'kode_pos.required' => 'Form kode pos tidak boleh kosong',
            'kode_pos.numeric'     => 'form kode pos bersifat angka',

            'jenis_tinggal.required' => 'Form jenis tinggal tidak boleh kosong',
            'mode_transportasi.required' => 'Form mode transportasi tidak boleh kosong',
            'no_hp.required' => 'Form no hp tidak boleh kosong',
            'no_hp.numeric'     => 'form no hp bersifat angka',
          
      
            // 'nomor_kks.alpha_num' => 'nomor kks hanya terdiri huruf dan angka tanpa spasi',
            'nomor_kks.unique'     => 'nomor kks sudah terdaftar',
            // 'nomor_kks.digits'     => 'form panjang nomor kks 16 karakter'

            // 'nomor_KPS_PKH.alpha_num' => 'nomor kps/pkh hanya terdiri huruf dan angka tanpa spasi',
            'nomor_KPS_PKH.unique'     => 'form nomor kps/pkh sudah terdaftar',

            
            'nomor_kip.unique'     => 'nomor kip sudah terdaftar',
            'nomor_kip.digits'     => 'form panjang nomor kip 6 karakter',
            // 'nomor_kip.alpha_num'     => 'form nomor kip bersifat angka dan huruf tanpa spasi',
            'nama_kip.max'     => 'maksimal nama kip 50 karakter',

            'berat_badan.required' => 'Form berat badan tidak boleh kosong',
            'tinggi_badan.required' => 'Form tinggi badan tidak boleh kosong',
            'jarak_rumah_sekolah.required' => 'Form jarak rumah kesekolah tidak boleh kosong',
            'waktu_tempuh.required' => 'Form waktu tempuh tidak boleh kosong',
            // 'berat_badan.digits' => 'panjang form berat badan maksimal 3 karakter ',
            // 'tinggi_badan.digits' => 'panjang form berat badan maksimal 3 karakter ',
            // 'jarak_rumah_sekolah.min' => 'panjang form jarak rumah maksimal 1 karakter ',
            // 'waktu_tempuh.min' => 'panjang form waktu tempuh maksimal 1 karakter ',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        tb_biodata::where('nisn_biodata', $nisn)->update([
            'jenkel' => $request->jenkel,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jml_sdr_kdg' => $request->jml_sdr_kdg,
            'anak_keberapa' => $request->anak_keberapa,
            'agama_id' => $request->agama_id,
            'no_akte' => $request->no_akte,
            'status_kewarganegaraan' => $request->is_kewarganegaraan,
            'alamat' => $request->alamat,
            'rt' =>  isset($request->rt) ? $request->rt : null,
            'rw' =>  isset($request->rw) ? $request->rw : null,
            'nama_dusun' => $request->nama_dusun,
            'kelurahan_desa' => $request->kelurahan_desa,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'jenis_tinggal'=> $request->jenis_tinggal,
            'mode_transportasi'=> $request->mode_transportasi,
            'no_hp'=> $request->no_hp,
            
            'status_kks' => $request->status_KKS,
            'nomor_kks' => isset($request->nomor_kks) ? $request->nomor_kks : null,
            'status_KPS_PKH'=> $request->is_store_open_pkh,
            'nomor_KPS_PKH' => isset($request->nomor_KPS_PKH) ? $request->nomor_KPS_PKH : null,
            'status_kip'=> $request->is_store_open_kip,
            'nomor_kip' => isset($request->nomor_kip) ? $request->nomor_kip : null,
            'nama_kip' => isset($request->nama_kip) ? $request->nama_kip : null,
            'berat_badan'=> $request->berat_badan,
            'tinggi_badan'=> $request->tinggi_badan,
            'jarak_rumah_sekolah'=> $request->jarak_rumah_sekolah,
            'waktu_tempuh'=> $request->waktu_tempuh,
        ]);

        return \redirect()->route('biodataEdit', $nisn)->with('success', 'biodata diri tambahan berhasil diperbarui, silahkan lengkap biodata berikutnya');

    }

}
