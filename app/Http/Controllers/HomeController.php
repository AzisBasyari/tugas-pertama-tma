<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pengguna = DB::table('penggunas')
                        ->join('provinces', 'penggunas.id_provinsi', '=', 'provinces.id')
                        ->join('regencies', 'penggunas.id_kota', '=', 'regencies.id')
                        ->join('districts', 'penggunas.id_kecamatan', '=', 'districts.id')
                        ->select('penggunas.*', 'provinces.name as provinsi', 'regencies.name as kota', 'districts.name as kecamatan')
                        ->get();
        return view('home', [
            "pengguna" => $pengguna
        ]);
    }
}
