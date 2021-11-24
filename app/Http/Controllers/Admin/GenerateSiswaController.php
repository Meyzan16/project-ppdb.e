<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\tb_ortu;
use App\Models\tb_berkas;
use App\Models\tb_biodata;

class GenerateSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.main.generate-akun');
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
            'nisn' => 'required|digits:10',
            'name'=> 'required'
        ];

        //pasang pesan kesalahan
        $messages = [
            'nisn.numeric'     => 'karakter nisn bersifat numerik',
            'nisn.digits'     => 'Nisn bersifat 10 digit angka',
            'nisn.max'     => 'Nisn maksimal 10 digit angka',
            'name.alpha'     => 'Karakter nama bersifat huruf',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        } else{
                    $data = $request->all();
                    $generate_pass =  Str::random(12);
            
                    $data['password'] =$generate_pass;
                    $data['tahun_daftar'] = date('y');
                    $data['status_lulus'] = 'N';
                    $data['roles'] = 'SISWA';   
            
                    User::create($data);
            
                    DB::table('tb_ortus')->insert([
                        'nisn_ortu' => $request->nisn,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ]);
    
                    DB::table('tb_berkas')->insert([
                        'nisn_berkas' => $request->nisn,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ]);
    
                    DB::table('tb_biodatas')->insert([
                        'nisn_biodata' => $request->nisn,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ]);
                
                    return \redirect()->route('generate-akun.index')->with('success', 'Data Post Berhasil Ditambahkan');

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