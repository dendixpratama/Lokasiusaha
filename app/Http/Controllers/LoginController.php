<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use DB;
use Session;

class LoginController extends Controller
{

    public function index()
    {
        if (!Session::get('v_login')) {
            return redirect('v_login')->with('success', 'Silahkan Login terlebih dahulu');
        } else {
            return view('admin.dashboard');
        }
    }

    // Login
    protected function LoginAdmin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', $username)->first();

        if (count((array) $data) > 0) { //apakah email tersebut ada atau tidak

            if ($password == $data->password) {

                Session::put('adminid',    $data->id_admin);
                Session::put('nama_admin', $data->nama_admin);
                Session::put('telepon',    $data->telepon);
                Session::put('email',      $data->email);
                Session::put('username',   $data->username);
                Session::put('passsword',  $data->passsword);
                Session::put('status',     $data->status);
                Session::put('v_login',      TRUE);

                if ($data->status == "Aktif") {
                    return redirect('/dashboard_admin')->with('success', 'Berhasil Login');
                }
            } else {
                return redirect('v_login')->with('success', 'Gagal ! Password salah.');
            }
        } else {
            return redirect('v_login')->with('success', 'Gagal ! Username salah.');
        }
    }

    public function indexp()
    {
        if (!Session::get('login')) {
            return redirect('login')->with('success', 'Silahkan Login terlebih dahulu');
        } else {
            return view('dashboard');
        }
    }

    // Login
    protected function LoginUser(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $data = User::where('username', $username)->first();

        if (count((array) $data) > 0) { //apakah email tersebut ada atau tidak

            if ($password == $data->password) {

                Session::put('userid', $data->id_user);
                Session::put('nama_user',   $data->nama_user);
                Session::put('telepon',    $data->telepon);
                Session::put('email',      $data->email);
                Session::put('username',   $data->username);
                Session::put('passsword',  $data->passsword);
                Session::put('status',     $data->status);
                Session::put('login',      TRUE);

                if ($data->status == "Aktif") {
                    return redirect('/dashboard')->with('success', 'Berhasil Login');
                }
            } else {
                return redirect('login')->with('success', 'Gagal ! Password salah.');
            }
        } else {
            return redirect('login')->with('success', 'Gagal ! Username salah.');
        }
    }

    //logout
    public function logout()
    {
        Session::flush();
        return redirect('/')->with('success', 'Berhasil ! Anda berhasil keluar dari Sistem.');
    }

    //logout
    public function plogout()
    {
        Session::flush();
        return redirect('/dashboard')->with('success', 'Berhasil ! Anda berhasil keluar dari Sistem.');
    }
}
