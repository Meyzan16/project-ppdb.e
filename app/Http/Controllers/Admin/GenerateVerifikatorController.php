<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\user;

class GenerateVerifikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('id','desc')->get();

        return view('admin.main.generate-akun-verifikator', compact('data'));
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
        //pasang rules
        $rules = [
            'username' => 'required|unique:users',
            'nama'=> 'required',
            'password'=> 'required'
        ];

        //pasang pesan kesalahan
        $messages = [
            'nisn.unique'     => 'nisn sudah terdaftar',
            'username.required'     => 'Form username wajib diisi',
            'nama.required'     => 'Form nama wajib diisi',
            'password.required'     => 'Form password wajib diisi',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else{

                    $data = $request->all();

                    $data['password'] = Hash::make($data['password']);
                    $data['status_aktif'] = 'N'; 
            
                    user::create($data);
        
                    return \redirect()->route('generate-akun-verifikator.index')->with('success', 'Data Verifikator Berhasil Ditambahkan');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = $request->all();
        $datalama = User::where('id', $id)->first();

        $rules = [
         
        ];
        
        if($data['username'] != $datalama->username){
            $rules['username'] = 'required|unique:users';
        }

        $validator = Validator::make($data,$rules);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
            return redirect()->back()->with('error', 'Username sudah terdaftar');
        }

        $item = User::findorfail($id);
        $item->update($data); 
        return redirect()->route('generate-akun-verifikator.index')->with(['success' =>  'Data Berhasil diperbarui']);



        
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
