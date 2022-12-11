<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Penilaian;
use App\Models\User;

class PenilaianController extends Controller
{
    public function __construct()
    {
        $this->user = new user();
    }

    public function index()
    {

        $penilaians = DB::table('tb_user as a')
            ->join('tb_penilaian as b', 'a.id_user', '=', 'b.id_user')
            ->get();

        $users = DB::table('tb_user as a')
            ->select(DB::raw("CONCAT(a.nama_user) AS nama_user"), 'a.id_user')
            ->pluck('nama_user', 'id_user')
            ->all();

        return view('admin.penilaian.index', ['penilaians' => $penilaians, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'   => 'required',
            'nama_penilaian' => 'required',
            'deskripsi'      => 'required',
        ]);

        $penilaian = new Penilaian();
        $penilaian->id_user    = $request->id_user;
        $penilaian->nama_penilaian  = $request->nama_penilaian;
        $penilaian->deskripsi       = $request->deskripsi;
        $penilaian->tanggal         = date("Y-m-d");
        $penilaian->jam             = date("H:i:s");
        $penilaian->status          = $request->status;
        $penilaian->keterangan      = $request->keterangan;
        $penilaian->save();

        return redirect()->route('penilaians.index')->with('pesan', 'Simpan Data penilaian Berhasil.');
    }

    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'id_user'     => 'required|max:50',
            'nama_penilaian'   => 'required',
            'deskripsi'        => 'required',
        ]);

        DB::table('tb_penilaian')
            ->where('id_penilaian', $id)
            ->update(
                [
                    'id_user'     => $request->id_user,
                    'nama_penilaian'   => $request->nama_penilaian,
                    'deskripsi'        => $request->deskripsi,
                    'tanggal'          => date("Y:m:d"),
                    'jam'              => date("H:i:s"),
                    'status'           => $request->status,
                    'keterangan'       => $request->keterangan
                ]
            );

        return redirect()->route('penilaians.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id)
    {
        DB::table('tb_penilaian')->where('id_penilaian', '=', $id)->delete();

        return redirect()->route('penilaians.index')->with('pesan', "Hapus data berhasil");
    }
}
