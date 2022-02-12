<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tindakan;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datatindakan = Tindakan::all();
        return view('tindakan/index', ['tindakan' => $datatindakan]);
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
        Tindakan::create([
            'nama_tindakan' => $request->nama_tindakan,
            'biaya' => $request->biaya
        ]);

        \Session::flash('success', 'Berhasil Ditambahkan!');
        
        return redirect()->route('tindakan.index');
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
        $tindakan = Tindakan::find($id);
        $tindakan->nama_tindakan = $request->nama_tindakan;
        $tindakan->biaya = $request->biaya;
        $tindakan->save();

        \Session::flash('success', 'Edit Berhasil!');
        return redirect()->route('tindakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tindakan = Tindakan::find($id);
        $tindakan->delete();

        \Session::flash('success', 'Delete Berhasil!');
        return redirect()->route('tindakan.index');
    }
}
