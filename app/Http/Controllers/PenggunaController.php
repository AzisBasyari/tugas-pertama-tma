<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = DB::table('penggunas')
                        ->join('provinces', 'penggunas.id_provinsi', '=', 'provinces.id')
                        ->join('regencies', 'penggunas.id_kota', '=', 'regencies.id')
                        ->join('districts', 'penggunas.id_kecamatan', '=', 'districts.id')
                        ->select('penggunas.*', 'provinces.name as provinsi', 'regencies.name as kota', 'districts.name as kecamatan')
                        ->get();
        return response()->json([
            'data' => $pengguna,
            'success' => true,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenggunaRequest $request)
    {
        $validatedData  = $request->validated();

        $data = Pengguna::create([
            'name' => $validatedData['name'],
            'password' => Hash::make($validatedData['password']),
            'id_provinsi' => $validatedData['provinsi'],
            'id_kota' => $validatedData['kota'],
            'id_kecamatan' => $validatedData['kecamatan'],
        ]);

        if($data){
            // return redirect('/')->with('success', 'Registrasi berhasil, silakan masuk!');
            return response()->json([
                'success' => true
            ], 200);
        } else {
            // return back()->with('error', 'Registrasi gagal, silakan ulangi!');
            return response()->json([
                'success' => false,
                // 'error' => $validatedData->errors()->all(),
                'message' => 'Tambah data gagal!'
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $pengguna)
    {
        // $view = redirect('show');

        if ($pengguna != null) {
            return response()->json([
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
            ], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {

        $penggunas = DB::table('penggunas')
                        ->join('provinces', 'penggunas.id_provinsi', '=', 'provinces.id')
                        ->join('regencies', 'penggunas.id_kota', '=', 'regencies.id')
                        ->join('districts', 'penggunas.id_kecamatan', '=', 'districts.id')
                        ->select('penggunas.*', 'provinces.name as provinsi', 'regencies.name as kota', 'districts.name as kecamatan')
                        ->where('penggunas.id', '=', $pengguna->id)
                        ->first();

        // dd($penggunas);
        return view('edit', [
            'pengguna' => $penggunas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenggunaRequest  $request
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        $validatedData  = $request->validated();


        $data = $pengguna->update([
            'name' => $validatedData['name'],
            'id_provinsi' => $validatedData['provinsi'],
            'id_kota' => $validatedData['kota'],
            'id_kecamatan' => $validatedData['kecamatan'],
        ]);

        if($data){
            // return redirect('/')->with('success', 'Registrasi berhasil, silakan masuk!');
            return response()->json([
                'success' => true
            ], 200);
        } else {
            // return back()->with('error', 'Registrasi gagal, silakan ulangi!');
            return response()->json([
                'success' => false,
                'message' => 'Tambah data gagal!'
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $delete = Pengguna::findOrfail($pengguna->id)->delete();

        // $delete = $pengguna->delete();

        if($delete){
            // return redirect('/')->with('success', 'Registrasi berhasil, silakan masuk!');
            return response()->json([
                'success' => true
            ], 200);
        } else {
            // return back()->with('error', 'Registrasi gagal, silakan ulangi!');
            return response()->json([
                'success' => false,
                'message' => 'Tambah data gagal!'
            ], 401);
        }
    }
}
