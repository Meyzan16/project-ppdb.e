<?php

namespace App\Http\Controllers\siswa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\tb_biodata;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DataTambahanSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    public function update(Request $request, $nisn)
    {

        // pasang rules
        $rules = [
            'is_store_open_kks' => 'required',
            'nomor_kks'=> 'nullable|numeric|digits:16|unique:tb_biodatas',
        ];

        //pasang pesan kesalahan
        $messages = [
            'nomor_kks.unique'     => 'nik sudah terdaftar',
            'nomor_kks.digits'     => 'panjang nomor kks 16 karakter',
            'nomor_kks.numeric'     => 'nomor kks bersifat angka',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data =  [
            'status_kks' => $request->is_store_open_kks,
            'nomor_kks' => isset($request->nomor_kks) ? $request->nomor_kks : '',
        ];

        $item = tb_biodata::where('nisn_biodata', $nisn);
        $item->update($data);

        return "berhasil";

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
