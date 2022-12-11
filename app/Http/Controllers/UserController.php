<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'telepon'        => 'required',
            'email'          => 'required',
            'username'       => 'required',
            'password'       => 'required',
        ]);

        $user = new User();
        $user->nama_user  = $request->nama_user;
        $user->telepon         = $request->telepon;
        $user->email           = $request->email;
        $user->username        = $request->username;
        $user->password        = $request->password;
        $user->status          = $request->status;
        $user->keterangan      = $request->keterangan;
        $user->save();

        return redirect()->route('users.index')->with('pesan', 'Simpan Data User Berhasil.');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_user'    => 'required|max:50',
            'email'             => 'required',
            'password'          => 'required',
        ]);

        DB::table('tb_user')
            ->where('id_user', $id)
            ->update(
                [
                    'nama_user' => $request->nama_user,
                    'telepon'        => $request->telepon,
                    'email'          => $request->email,
                    'username'       => $request->username,
                    'password'       => $request->password,
                    'status'         => $request->status,
                    'keterangan'     => $request->keterangan
                ]
            );

        return redirect()->route('users.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id)
    {
        DB::table('tb_user')->where('id_user', '=', $id)->delete();

        return redirect()->route('users.index')->with('pesan', "Hapus data berhasil");
    }

    // public function profilPelanggan()
    // {
    //     // $pelanggans = DB::table('tb_pelanggan as a')
    //     //     ->where('a.id_pelanggan', '=', $id)
    //     //     ->first();

    //     $pelanggans = Pelanggan::all();
    //     return view('profil_pelanggan', ['pelanggans' => $pelanggans]);
    // }
}
