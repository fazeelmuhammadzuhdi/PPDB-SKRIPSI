<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    public function showLoginForm()
    {
        $tanggalSekarang = now()->toDateString();
        $tanggalAkhirPendaftaran = settings('akhir_pendaftaran');

        return view('auth.login_admin', compact('tanggalSekarang', 'tanggalAkhirPendaftaran'));
    }

    public function authenticated(Request $request, $user)
    {

        if ($user->akses == 'Admin Dinas' || $user->akses == 'Admin Sekolah' || $user->akses == 'Kepala Dinas') {
            return redirect()->route('dashboard_dinas');
        } elseif ($user->akses == 'Siswa') {
            return redirect()->route('dashboard_siswa');
        } else {
            Auth::logout();
            flash()->addError('Anda tidak memiliki hak akses');
            return redirect()->route('login');
        }
    }
}
