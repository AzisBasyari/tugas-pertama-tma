<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
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
    public function store(RegisterRequest $request)
    {
        $validatedData  = $request->validated();

        // dd($validatedData);

        $data = User::create([
            'name' => $validatedData['name'],
            'password' => $validatedData['password'],
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
                'message' => 'Register gagal!'
            ], 401);
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
