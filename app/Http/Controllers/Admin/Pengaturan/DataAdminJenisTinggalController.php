<?php

namespace App\Http\Controllers\Admin\Pengaturan;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\tb_jenis_tinggal;

class DataAdminJenisTinggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tb_jenis_tinggal::all(); 
    
        return view('admin.main.pengaturan.jenis-tinggal.index',compact('data'));
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
        $data = $request->all();

        tb_jenis_tinggal::create($data);
        return redirect()->route('data-jenis-tinggal.index')->with(['success' =>  'Data Berhasil Di simpan']);
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

        $item = tb_jenis_tinggal::findorfail($id);
        $item->update($data); 

        return redirect()->route('data-jenis-tinggal.index')->with(['success' =>  'Data Berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tb_jenis_tinggal::findorfail($id)->delete();   
        return redirect()->route('data-jenis-tinggal.index')->with(['success' =>  'Data Berhasil dihapus']);
    }

    // menampilkan data guru yang sudah dihapus
    public function trash()
    {
      
        $data = tb_jenis_tinggal::onlyTrashed()->latest()->get();
        
        return view('admin.main.pengaturan.jenis-tinggal.trash',compact('data'));
    }

    public function restore($id) 
    {
        tb_jenis_tinggal::where('id', $id)->withTrashed()->restore();

        return redirect()->route('data-jenis-tinggal.index')->with('success', 'Data berhasil di kembalikan');
    }
}
