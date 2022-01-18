<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\tb_biodata;
use Illuminate\Support\Facades\Auth;

class PerbaikanDatadiri_siswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $query = tb_biodata::where('nisn_biodata', session()->get('nisn'))->first();
        
        if($query->status_tb_biodata == 'N' && $query->catatan_biodata != '')
        {
            return $next($request);
        }
        return redirect()->route('dashboard-siswa');


       
        
    }
}
