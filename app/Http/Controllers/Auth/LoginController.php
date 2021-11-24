<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\tb_ortu;
use App\Models\tb_berkas;
use App\Models\tb_biodata;
use App\Models\user;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index(){
    
            $data = [
                'title' => 'Login',
            ];
            return view('login.login', $data);
        } 

    public function authenticate(Request $request)
    {
        //pasang rules
        $rules = [
            'nisn' => 'required|numeric',
            'password'=> 'required|min:8'
        ];

        //pasang pesan kesalahan
        $messages = [
            'nisn.numeric'     => 'nisn bersifat numerik',
            'password.min'     => 'Password minimal 8 karakter',
        ];

        //ambil semua request dan pasang rules dan isi pesanya
        $validator = Validator::make($request->all(), $rules, $messages);
        //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
        if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
    

        // //ambil query dengan kondisi masing-masing
        $cek_nisn = user::where('nisn', $request->nisn)->first();
        $cek_password = user::where('password', $request->password)->first();

        if ($cek_nisn && $cek_password) {
                 session(['berhasil_login' => true]);
                 session(['roles' => $cek_nisn->roles]);
                 $request->session()->put('nisn', $cek_nisn->nisn);
                 $request->session()->put('nama', $cek_nisn->name);
                 
                 return redirect()->intended('/siswa');
        }

        return back()->with('loginerror', 'Login gagal');
        

    }

    public function logout(Request $request){

        Auth::logout();

        //invalid session supaya tidak bisa dipakai
        $request->session()->flush();
        $request->session()->invalidate();
        //bikin token baru supaya tidak dibajak
        $request->session()->regenerateToken();
        //redirect ke halaman mana
        return \redirect()->route('login');
    }
    
}
