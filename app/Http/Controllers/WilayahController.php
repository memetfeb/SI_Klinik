<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wilayah;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datawilayah = Wilayah::all();
        return view('wilayah/index', ['wilayah' => $datawilayah]);
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
        Wilayah::create([
            'nama_wilayah' => $request->nama_wilayah,
            'alamat' => $request->alamat
        ]);

        \Session::flash('success', 'Berhasil Ditambahkan!');
        
        return redirect()->route('wilayah.index');
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
        $wilayah = Wilayah::find($id);
        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->alamat = $request->alamat;
        $wilayah->save();

        \Session::flash('success', 'Edit Berhasil!');
        return redirect()->route('wilayah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wilayah = Wilayah::find($id);
        $wilayah->delete();

        \Session::flash('success', 'Delete Berhasil!');
        return redirect()->route('wilayah.index');
    }
}
