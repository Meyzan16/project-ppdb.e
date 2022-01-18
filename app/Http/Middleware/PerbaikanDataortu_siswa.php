<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\tb_ortu;
use Illuminate\Support\Facades\Auth;

class PerbaikanDataortu_siswa
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
        $query = tb_ortu::where('nisn_ortu', session()->get('nisn'))->first();
        
        if($query->status_ortu == 'N' && $query->catatan_ortu != '')
        {
            return $next($request);
        }
        return redirect()->route('dashboard-siswa');


       
        
    }
}
