<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $regencies = [];
        $provinceID = $request->provinceID;
        if ($request->has('q')) {
            $search = $request->q;
            $regencies = Regency::select("id", "name")
                ->where('province_id', $provinceID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $regencies = Regency::where('province_id', $provinceID)->limit(10)->get();
        }
        return response()->json($regencies);
    }
}
