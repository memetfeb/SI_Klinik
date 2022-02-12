<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\wilayah;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datapegawai = Pegawai::all();

        $datapegawai = DB::table('pegawai')
            ->join('users', 'pegawai.id', '=', 'users.id_pegawai')
            ->join('wilayah', 'pegawai.id_wilayah', '=', 'wilayah.id')
            ->select('pegawai.*', 'users.email', 'users.password', 'wilayah.nama_wilayah')
            ->get();

        return view('pegawai/index', ['pegawai' => $datapegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = Wilayah::all();

        return view('pegawai/tambah', ['wilayah' => $wilayah]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawaicreate = Pegawai::create([
            'NIP' => $request->NIP,
            'nama' => $request->nama_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'id_wilayah' => $request->id_wilayah
        ]);

        if($pegawaicreate->id){
            $usercreate = User::create([
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
                'id_pegawai' => $pegawaicreate->id
            ]);
        }else{
            $pegawaicreate->delete();
        }

        \Session::flash('success', 'Berhasil Ditambahkan!');

        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'pegawai.id', '=', 'users.id_pegawai')
            ->join('wilayah', 'pegawai.id_wilayah', '=', 'wilayah.id')
            ->select('pegawai.*', 'users.email', 'users.password', 'users.role', 'wilayah.nama_wilayah')
            ->where('pegawai.id',$id)
            ->first();

            $wilayah = Wilayah::all();

        return view('pegawai/detail', [
            'pegawai' => $pegawai, 
            'wilayah' => $wilayah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = DB::table('pegawai')
            ->join('users', 'pegawai.id', '=', 'users.id_pegawai')
            ->join('wilayah', 'pegawai.id_wilayah', '=', 'wilayah.id')
            ->select('pegawai.*', 'users.email', 'users.password', 'users.role', 'wilayah.nama_wilayah')
            ->where('pegawai.id',$id)
            ->first();

            $wilayah = Wilayah::all();

        return view('pegawai/edit', [
            'pegawai' => $pegawai, 
            'wilayah' => $wilayah
        ]);
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
        $pegawai = Pegawai::find($id);
        $pegawai->NIP = $request->NIP;
        $pegawai->nama = $request->nama_pegawai;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->alamat = $request->alamat;
        $pegawai->id_wilayah = $request->id_wilayah;
        $pegawai->save();

        $user = User::where('id_pegawai','=',$id)->first();
        $user->email = $request->email;
        $user->role = $request->role;

        if($request->password != NULL){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        \Session::flash('success', 'Berhasil Diubah!');

        return redirect()->route('pegawai.show',($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $user = User::where('id_pegawai', $id);

        $user->delete();
        $pegawai->delete();

        \Session::flash('success', 'Delete Berhasil!');
        return redirect()->route('pegawai.index');
    }
}
