<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DaftarController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        //dd($request);
        $count = DB::table('tb_user')->count();

        // simpan ke data peserta
        $user = new User();
        $user->nama_user    = $request->nama_user;
        $user->telepon           = $request->telepon;
        $user->email             = $request->email;
        $user->username          = $request->username;
        $user->password          = $request->password;
        $user->status            = 'Aktif';
        $user->keterangan        = '-';
        $user->save();

        return redirect('/login')->with('success', 'Pendaftaran user Berhasil.');
    }
}
