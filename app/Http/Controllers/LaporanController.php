<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Wilayah;


use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_sekarang = date("Y");
        $tahun_kemarin = date("Y")-1;

        $bulan_sekarang = date("M");
        $bulan_sekarang2 = date("m");

        // Line Chart
        $total_biaya_perbulan_tahun_sekarang = DB::select( DB::raw("SELECT MONTH(tanggal_pendaftaran) AS bulan, SUM(total_biaya) AS total_biaya
        FROM transaksi
        WHERE YEAR(tanggal_pendaftaran) = $tahun_sekarang
        GROUP BY MONTH(tanggal_pendaftaran)"));

        $total_biaya_perbulan_tahun_kemarin = DB::select( DB::raw("SELECT MONTH(tanggal_pendaftaran) AS bulan, SUM(total_biaya) AS total_biaya
        FROM transaksi
        WHERE YEAR(tanggal_pendaftaran) = $tahun_kemarin
        GROUP BY MONTH(tanggal_pendaftaran)"));

        // Piechart Jumlah pendaftaran per wilayah
        $total_pendaftaran_per_wilayah_bulan_sekarang = DB::select( DB::raw("SELECT wilayah.nama_wilayah AS namawilayah, COUNT(*) AS total_transaksi
        FROM transaksi, wilayah
        WHERE MONTH(tanggal_pendaftaran) = $bulan_sekarang2 AND YEAR(tanggal_pendaftaran) = $tahun_sekarang AND transaksi.id_wilayah = wilayah.id
        GROUP BY wilayah.nama_wilayah"));

        // Piechart Jumlah Pendapatan per wilayah
        $total_pendapatan_per_wilayah_bulan_sekarang = DB::select( DB::raw("SELECT wilayah.nama_wilayah AS namawilayah, SUM(total_biaya) AS total_transaksi
        FROM transaksi, wilayah
        WHERE MONTH(tanggal_pendaftaran) = $bulan_sekarang2 AND YEAR(tanggal_pendaftaran) = $tahun_sekarang AND transaksi.id_wilayah = wilayah.id
        GROUP BY wilayah.nama_wilayah"));


        return view('laporan/index', [
            'tahun_sekarang' => $tahun_sekarang, 
            'tahun_kemarin' => $tahun_kemarin, 
            'total_biaya_perbulan_tahun_sekarang' => $total_biaya_perbulan_tahun_sekarang, 
            'total_biaya_perbulan_tahun_kemarin' => $total_biaya_perbulan_tahun_kemarin,
            'bulan_sekarang' => $bulan_sekarang,
            'total_pendaftaran_per_wilayah_bulan_sekarang' => $total_pendaftaran_per_wilayah_bulan_sekarang,
            'total_pendapatan_per_wilayah_bulan_sekarang' => $total_pendapatan_per_wilayah_bulan_sekarang
        ]);
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
        //
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
