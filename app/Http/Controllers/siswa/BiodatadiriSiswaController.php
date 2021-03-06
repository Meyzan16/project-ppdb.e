<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_user_siswa;
use App\Models\tb_biodata;
use App\Models\tb_agama;
use App\Models\tb_jenis_tinggal;
use App\Models\mode_transportasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BiodatadiriSiswaController extends Controller
{
   
    public function index()
    {

        $item = tb_user_siswa::where('nisn', session()->get('nisn'))->first();
    
        return view('siswa.main.datadiri.biodata', compact('item'));
    }

    public function edit($nisn)
    {
        $agama =  tb_agama::all();
        $jenis_tinggal = tb_jenis_tinggal::all();
        $mode_trans = mode_transportasi::all();       

        $item = tb_user_siswa::where('nisn', session()->get('nisn'))->first();
        
        return view('siswa.main.datadiri.biodata-diri', compact('item','jenis_tinggal' , 'mode_trans','agama')); 
    }


    public function update(Request $request, $nisn)
    {
       // pasang rules
        $rules = [
            'nik'=> 'required|numeric|digits:16|unique:tb_user_siswas',
            'email'=> 'required|unique:tb_user_siswas',
            'name' => 'required|max:40',
            'username'=> 'required|alpha_num|min:8',
            'password'=> 'required|min:8',
        ];

        //pasang pesan kesalahan
        $messages = [
            'nisn.numeric'     => 'nisn bersifat numerik',
            'nisn.digits'     => 'nisn bersifat 10 digit',
            'nik.numeric'     => 'nik bersifat numerik',
            'nik.unique'     => 'nik sudah terdaftar',
            'nik.digits'     => 'nik bersifat 16 digit',
            'name.max'     => 'maksimal nama 40 karakter',
            'email.unique'     => 'email sudah terdaftar',
            'username.min'     => 'username minimal 8 karakter',
            'username.alpha_num'     => 'username bersifat huruf dan angka',
            'password.min'     => 'password minimal 8 karakter',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //$password = bcrypt($request->password)

        tb_user_siswa::where('nisn', $nisn)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return \redirect()->route('biodataEdit', $request->nisn)->with('success', 'Data utama berhasil diperbarui, silahkan lengkapi data tambahan');
    }
    

    public function perbaikan_data($nisn)
    {
        $agama =  tb_agama::all();
        $jenis_tinggal = tb_jenis_tinggal::all();
        $mode_trans = mode_transportasi::all();       

        $item = tb_biodata::where('nisn_biodata', $nisn)->first();
        
        return view('siswa.main.datadiri.perbaikan_data', compact('item','jenis_tinggal' , 'mode_trans','agama')); 
    }

    public function update_perbaikan_data(Request $request, $nisn)
    {
        $query = tb_user_siswa::where('nisn', $nisn)->first();

        
        $rules = [
            'name' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'agama_id' => 'required',
            'anak_keberapa' => 'required|max:2',
            'jml_sdr_kdg' => 'required|max:2',
            'status_kewarganegaraan' => 'required',
            'alamat' => 'required',
            'rt' => 'nullable',
            'rw' => 'nullable',
            'nama_dusun' => 'required|max:100',
            'kelurahan_desa' => 'required|max:100',
            'kecamatan' => 'required|max:100',
            'kode_pos' => 'required|numeric|digits:5',

           

            'no_hp' => 'required|numeric',
            'berat_badan' => 'required|max:3',
            'tinggi_badan' => 'required|max:3',
            'jarak_rumah_sekolah' => 'required|max:5',
            'waktu_tempuh' => 'required|max:5',

        ];

        if($request->nik != $query->nik){
            $rules['nik'] = 'required|numeric|digits:16|unique:tb_user_siswas';
        }
        if($request->no_akte != $query->tb_biodata->no_akte){
            $rules['no_akte'] = 'required|max:30|unique:tb_biodatas';
        }
        if($request->nomor_kks != $query->tb_biodata->nomor_kks){
            $rules['nomor_kks'] =  'nullable|unique:tb_biodatas';
        }
        if($request->nomor_KPS_PKH != $query->tb_biodata->nomor_KPS_PKH){
            $rules['nomor_KPS_PKH'] =  'nullable|unique:tb_biodatas';
        }
        if($request->nomor_kip != $query->tb_biodata->nomor_kip){
            $rules['nomor_kip'] =  'nullable|unique:tb_biodatas';
            $rules['nama_kip'] =  'nullable|max:50';
        }
      
  

        //pasang pesan kesalahan
        $messages = [
            'nik.required'     => 'form nik tidak boleh kosong',
            'nik.numeric'     => 'nik bersifat numerik',
            'nik.unique'     => 'nik sudah terdaftar',
            'nik.digits'     => 'nik bersifat 16 digit',
            'name.required'     => 'form nama tidak boleh kosong',
            'email.unique'     => 'email sudah terdaftar',
            'email.required'     => 'form email tidak boleh kosong',
            // 'username.alpha_num'     => 'username bersifat huruf dan angka',
            'username.required'     => 'form username tidak boleh kosong',
            'username.min'     => 'username minimal 8 karakter',

            'tahun_daftar.required'     => 'form tahun daftar tidak boleh kosong',
            'tahun_daftar.digits'     => 'form tahun daftar bersifat 4 digit',

            'tempat_lahir.required'     => 'form tempat lahir tidak boleh kosong',
            'anak_keberapa.required'     => 'form anak keberapa tidak boleh kosong',
            'anak_keberapa.max' => 'panjang form anak berapa maksimal 2 karakter ',

            'jml_sdr_kdg.required'     => 'form saudara kandung tidak boleh kosong',
            'jml_sdr_kdg.max' => 'panjang form saudara kandung maksimal 2 karakter ',

            'no_akte.required' => 'Form no akte tidak boleh kosong',
            'no_akte.max' => 'panjang form no akte maksimal 30 karakter ',
            'no_akte.unique'     => 'nomor akte sudah terdaftar',

            'alamat.required'     => 'form alamattidak boleh kosong',

            'no_hp.required' => 'Form no hp tidak boleh kosong',
            'no_hp.numeric'     => 'form no hp bersifat angka',

            'nama_dusun.required' => 'Form nama dusun tidak boleh kosong',
            'nama_dusun.max' => 'panjang form nama dusun maksimal 100 karakter ',

            'kelurahan_desa.required' => 'Form kelurahan/desa tidak boleh kosong',
            'kelurahan_desa.max' => 'panjang form kelurahan/desa maksimal 100 karakter ',

            'kecamatan.required' => 'Form kecamatan tidak boleh kosong',
            'kecamatan.max' => 'panjang form kecamatan maksimal 100 karakter ',

            'kode_pos.required' => 'Form kode pos tidak boleh kosong',
            'kode_pos.numeric'     => 'form kode pos bersifat angka',
            'kode_pos.digits'     => 'form kode wajib 5 angka',


            'nomor_kks.unique'     => 'nomor kks sudah terdaftar',
         
            'nomor_KPS_PKH.unique'     => 'form nomor kps/pkh sudah terdaftar',

            'nomor_kip.unique'     => 'nomor kip sudah terdaftar',
            'nama_kip.max'     => 'maksimal nama kip 50 karakter',
            
            'jenis_tinggal.required' => 'Form jenis tinggal tidak boleh kosong',
            'mode_transportasi.required' => 'Form mode transportasi tidak boleh kosong',
            'berat_badan.required' => 'Form berat badan tidak boleh kosong',
            'berat_badan.max' => 'panjang form berat badan maksimal 3 karakter ',

            'tinggi_badan.required' => 'Form tinggi badan tidak boleh kosong',
            'tinggi_badan.max' => 'panjang form tinggi badan maksimal 3 karakter ',
            'jarak_rumah_sekolah.required' => 'Form jarak rumah kesekolah tidak boleh kosong',
            'jarak_rumah_sekolah.max' => 'panjang form jarak rumah sekolah maksimal 5 karakter ',
            'waktu_tempuh.required' => 'Form waktu tempuh tidak boleh kosong',
            'waktu_tempuh.max' => 'panjang form waktu tempuh maksimal 5 karakter ',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // return "berhasil/ lolos validasi";


        tb_user_siswa::where('nisn', $nisn)->update([
            'nik' => $request->nik,
            'name' => $request->name,
        ]);


        $item_nomor_kks = "";
        $item_nomor_kps_pkh = "";
        $item_nomor_kip = "";
        $item_nama_kip = "";

        if($request->status_KKS == 'false'){
            $item_nomor_kks = NULL;
        }else {
            $item_nomor_kks = $request->nomor_kks;
        }

        if($request->status_KPS_PKH == 'false'){
            $item_nomor_kps_pkh = NULL;
        }else {
            $item_nomor_kps_pkh = $request->nomor_KPS_PKH;
        }

        if($request->status_kip == 'false'){
            $item_nomor_kip = NULL;
            $item_nama_kip = NULL;
        }else {
            $item_nomor_kip = $request->nomor_kip;
            $item_nama_kip = $request->nama_kip;
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
            'nomor_kks' => $item_nomor_kks,
            'status_KPS_PKH'=> $request->status_KPS_PKH,
            'nomor_KPS_PKH' => $item_nomor_kps_pkh,
            'status_kip'=> $request->status_kip,
            'nomor_kip' => $item_nomor_kip,
            'nama_kip' => $item_nama_kip,
            'berat_badan'=> $request->berat_badan,
            'tinggi_badan'=> $request->tinggi_badan,
            'jarak_rumah_sekolah'=> $request->jarak_rumah_sekolah,
            'waktu_tempuh'=> $request->waktu_tempuh,

            'status_tb_biodata' => 'Y'
        ]);


        return \redirect()->route('dashboard-siswa')->with('success', 'Perbaikan Data biodata diri berhasil');
    }

}
