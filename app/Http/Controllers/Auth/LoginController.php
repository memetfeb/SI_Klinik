<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\User;
use App\Models\Wilayah;

use Illuminate\Support\Facades\DB;

use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if(Auth::user()->role == 'superadmin'){
            $this->redirectTo = url('/pegawai');
            return $this->redirectTo;
        }else{

            $user = User::find(Auth::user()->id);
            $pegawai = Pegawai::find($user->id_pegawai);
            $wilayah = Wilayah::find($pegawai->id_wilayah);

            session(['nama_pegawai' => $pegawai->nama]);
            session(['id_wilayah' => $pegawai->id_wilayah]);
            session(['nama_wilayah' => $wilayah->nama_wilayah]);


            $this->redirectTo = url('/transaksi');
            return $this->redirectTo; 
        }
    }
}
