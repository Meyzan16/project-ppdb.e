<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BiodatadiriSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = DB::table('users')
                ->join('tb_ortus', 'users.nisn', '=', 'tb_ortus.nisn_ortu')
                ->select('users.*', 'tb_ortus.*')
                ->where('users.nisn', '=', session()->get('nisn'))
                ->first();
    
        return view('siswa.main.biodata', [
            'item' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //membuat form biodata diri siswa
    public function create()
    {
           
    }

  
    public function store(Request $request)
    {
        
    }


    public function show($id)
    {
       
    }

    public function edit($nisn)
    {
        $query = User::where('nisn', $nisn)->first();
        
        return view('siswa.main.biodata-diri', [
            'item' => $query
        ]); 

        
    }


    public function update(Request $request, $nisn)
    {
       // pasang rules
        $rules = [
            'nik'=> 'required|numeric|digits:16|unique:users',
            'email'=> 'required|email:dns|unique:users',
            'name' => 'required|max:40',
            'username'=> 'required|min:8',
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
            'password.min'     => 'password minimal 8 karakter',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data =  [
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ];

        $item = User::where('nisn', $nisn);
        $item->update($data);

        return \redirect()->route('biodataEdit', $request->nisn)->with('success', 'Data utama berhasil diperbarui, silahkan lengkapi data tambahan');



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