<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $districts = [];
        $regencyID = $request->regencyID;
        if ($request->has('q')) {
            $search = $request->q;
            $districts = District::select("id", "name")
                ->where('regency_id', $regencyID)
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $districts = District::where('regency_id', $regencyID)->limit(10)->get();
        }
        return response()->json($districts);
    }
}
