<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\User;
use App\Models\Wilayah;
use App\Models\Obat;
use App\Models\Tindakan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "superadmin"){
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->get();
        }else{
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->where('transaksi.id_wilayah', session('id_wilayah'))
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->get();
        }
        

        return view('transaksi/index', ['transaksi' => $datatransaksi]);
    }

    public function index_tindakan()
    {
        $tindakan = Tindakan::all();
        $obat = Obat::all();

        if(Auth::user()->role == "superadmin"){
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->where('status_transaksi', "butuh_tindakan")
            ->get();
        }else{
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->where('status_transaksi', "butuh_tindakan")
            ->where('transaksi.id_wilayah', session('id_wilayah'))
            ->get();
        }

        
        return view('transaksi/index_tindakan', ['transaksi' => $datatransaksi, 'tindakan' => $tindakan, 'obat' => $obat]);
    }

    public function index_tagihan()
    {

        if(Auth::user()->role == "superadmin"){
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->where('status_transaksi', "butuh_pembayaran")
            ->get();
        }else{
            $datatransaksi = DB::table('transaksi')
            ->join('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->select('transaksi.*', 'wilayah.nama_wilayah')
            ->where('status_transaksi', "butuh_pembayaran")
            ->where('transaksi.id_wilayah', session('id_wilayah'))
            ->get();
        }
        

        return view('transaksi/index_tagihan', ['transaksi' => $datatransaksi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = Wilayah::all();
        $tindakan = Tindakan::all();
        $obat = Obat::all();

        return view('transaksi/tambah', ['wilayah' => $wilayah, 'tindakan' => $tindakan, 'obat' => $obat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksicreate = Transaksi::create([
            'NIK_pasien' => $request->NIK_pasien,
            'nama_pasien' => $request->nama_pasien,
            'tanggal_lahir_pasien' => $request->tanggal_lahir_pasien,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'keluhan' => $request->keluhan,
            'id_wilayah' => $request->id_wilayah,
            'total_biaya' => 0,
            'update_by' => Auth::user()->id
        ]);

        \Session::flash('success', 'Berhasil Ditambahkan!');

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datatransaksi = DB::table('transaksi')
            ->leftJoin('users', 'transaksi.update_by', '=', 'users.id')
            ->leftJoin('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->leftJoin('tindakan', 'transaksi.id_tindakan', '=', 'tindakan.id')
            ->leftJoin('obat', 'transaksi.id_obat', '=', 'obat.id')
            ->select('transaksi.*', 'users.email', 'tindakan.nama_tindakan', 'tindakan.biaya', 'obat.nama_obat', 'obat.biaya', 'wilayah.nama_wilayah')
            ->where('transaksi.id',$id)
            ->first();

        return view('transaksi/detail', ['transaksi' => $datatransaksi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datatransaksi = DB::table('transaksi')
            ->leftJoin('users', 'transaksi.update_by', '=', 'users.id')
            ->leftJoin('wilayah', 'transaksi.id_wilayah', '=', 'wilayah.id')
            ->leftJoin('tindakan', 'transaksi.id_tindakan', '=', 'tindakan.id')
            ->leftJoin('obat', 'transaksi.id_obat', '=', 'obat.id')
            ->select('transaksi.*', 'users.email', 'tindakan.nama_tindakan', 'tindakan.biaya', 'obat.nama_obat', 'obat.biaya', 'wilayah.nama_wilayah')
            ->where('transaksi.id',$id)
            ->first();

        $wilayah = Wilayah::all();
        $tindakan = Tindakan::all();
        $obat = Obat::all();


        return view('transaksi/edit', ['transaksi' => $datatransaksi, 'wilayah' => $wilayah, 'tindakan' => $tindakan, 'obat' => $obat]);
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
        $tindakan = DB::table('tindakan')
            ->where('tindakan.id',$request->id_tindakan)
            ->first();

        $obat = DB::table('obat')
            ->where('obat.id',$request->id_obat)
            ->first();

        $total_biaya = $tindakan->biaya + $obat->biaya;


        $transaksi = Transaksi::find($id);
        $transaksi->NIK_pasien = $request->NIK_pasien;
        $transaksi->nama_pasien = $request->nama_pasien;
        $transaksi->tanggal_lahir_pasien = $request->tanggal_lahir_pasien;
        $transaksi->tanggal_pendaftaran = $request->tanggal_pendaftaran;
        $transaksi->keluhan = $request->keluhan;
        $transaksi->id_wilayah = $request->id_wilayah;
        $transaksi->id_tindakan = $request->id_tindakan;
        $transaksi->id_obat = $request->id_obat;
        $transaksi->total_biaya = $total_biaya;
        $transaksi->update_by = 8;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->update_by = Auth::user()->id;

        $transaksi->save();

        \Session::flash('success', 'Berhasil Diubah!');

        return redirect()->route('transaksi.show',($id));
    }

    public function update_tindakan(Request $request, $id)
    {
        $tindakan = DB::table('tindakan')
            ->where('tindakan.id',$request->id_tindakan)
            ->first();

        $obat = DB::table('obat')
            ->where('obat.id',$request->id_obat)
            ->first();

        $total_biaya = $tindakan->biaya + $obat->biaya;
        // $total_biaya = 2000;


        $transaksi = Transaksi::find($id);
        $transaksi->id_tindakan = $request->id_tindakan;
        $transaksi->id_obat = $request->id_obat;
        $transaksi->total_biaya = $total_biaya;
        $transaksi->update_by = 8;
        $transaksi->status_transaksi = "butuh_pembayaran";
        $transaksi->update_by = Auth::user()->id;

        $transaksi->save();

        \Session::flash('success', 'Berhasil Diupdate!');

        return redirect('/butuh_tindakan');
    }

    public function update_pembayaran(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update_by = 8;
        $transaksi->status_transaksi = "Lunas/Selesai";
        $transaksi->update_by = Auth::user()->id;

        $transaksi->save();

        \Session::flash('success', 'Tagihan Berhasil Diupdate!');

        return redirect('/butuh_pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        \Session::flash('success', 'Delete Berhasil!');
        return redirect()->route('transaksi.index');
    }
}
