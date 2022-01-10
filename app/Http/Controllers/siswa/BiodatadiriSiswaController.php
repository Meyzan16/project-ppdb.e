<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tb_agama;
use App\Models\tb_jenis_tinggal;
use App\Models\mode_transportasi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BiodatadiriSiswaController extends Controller
{
   
    public function index()
    {

        $query = DB::table('users')
                ->join('tb_ortus', 'users.nisn', '=', 'tb_ortus.nisn_ortu')
                ->select('users.*', 'tb_ortus.*')
                ->where('users.nisn', '=', session()->get('nisn'))
                ->first();
    
        return view('siswa.main.datadiri.biodata', [
            'item' => $query
        ]);
    }

    public function edit($nisn)
    {
        $agama =  tb_agama::all();
        $jenis_tinggal = tb_jenis_tinggal::all();
        $mode_trans = mode_transportasi::all();       

        $item = DB::table('users')
        ->join('tb_biodatas', 'users.nisn', '=', 'tb_biodatas.nisn_biodata')
        ->select('users.*', 'tb_biodatas.*')
        ->where('users.nisn', '=', $nisn)
        ->first();
        
        return view('siswa.main.datadiri.biodata-diri', compact('item','jenis_tinggal' , 'mode_trans','agama')); 
    }


    public function update(Request $request, $nisn)
    {
       // pasang rules
        $rules = [
            'nik'=> 'required|numeric|digits:16|unique:users',
            'email'=> 'required|unique:users',
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

        User::where('nisn', $nisn)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ]);

        return \redirect()->route('biodataEdit', $request->nisn)->with('success', 'Data utama berhasil diperbarui, silahkan lengkapi data tambahan');
    }
    

    public function destroy($id)
    {
        //
    }

}
