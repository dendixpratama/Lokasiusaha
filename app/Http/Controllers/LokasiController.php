<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Lokasi;

class LokasiController extends Controller
{

    public function index()
    {
        if (!Session::get('v_login')) {
            return redirect('v_login')->with('success', 'Silahkan Login terlebih dahulu');
        } else {

            $lokasis = Lokasi::all();
            return view('admin.lokasi.index', ['lokasis' => $lokasis]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $imageName = time() . 'lokasi.' . $request->gambar->extension();
        $path = $request->gambar->move('ypathfile', $imageName);

        $lokasi = new Lokasi();
        $lokasi->nama_lokasi     = $request->nama_lokasi;
        $lokasi->deskripsi       = $request->deskripsi;
        $lokasi->fasilitas       = $request->fasilitas;
        $lokasi->alamat          = $request->alamat;
        $lokasi->harga           = $request->harga;
        $lokasi->status          = $request->status;
        $lokasi->keterangan      = $request->keterangan;
        $lokasi->gambar          = $imageName;
        $lokasi->save();

        return redirect()->route('lokasis.index')->with('pesan', 'Simpan Data Berhasil.');
    }

    public function update(Request $request, $id)
    {
        // rubah gambar
        if ($request->hasFile('gambar')) {
            $lokasi = DB::table('tb_lokasi as a')
                ->where('id_lokasi', '=', $id)
                ->first();
            // hapus fisik gambar            
            $image_path = public_path() . '/ypathfile/' . $lokasi->gambar;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $request->validate([
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = time() . 'lokasi.' . $request->gambar->extension();
            $path = $request->gambar->move('ypathfile', $imageName);

            DB::table('tb_lokasi')
                ->where('id_lokasi', $id)
                ->update(
                    [
                        'nama_lokasi' => $request->nama_lokasi,
                        'deskripsi'   => $request->deskripsi,
                        'fasilitas'   => $request->fasilitas,
                        'alamat'      => $request->alamat,
                        'harga'       => $request->harga,
                        'status'      => $request->status,
                        'keterangan'  => $request->keterangan,
                        'gambar'      => $imageName
                    ]
                );
        } else { // jika tidak rubah gambar

            DB::table('tb_lokasi')
                ->where('id_lokasi', $id)
                ->update(
                    [
                        'nama_lokasi' => $request->nama_lokasi,
                        'deskripsi'   => $request->deskripsi,
                        'fasilitas'   => $request->fasilitas,
                        'alamat'      => $request->alamat,
                        'harga'       => $request->harga,
                        'status'      => $request->status,
                        'keterangan'  => $request->keterangan
                    ]
                );
        }

        return redirect()->route('lokasis.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id)
    {
        $lokasi = DB::table('tb_lokasi as a')
            ->where('id_lokasi', '=', $id)
            ->first();

        $image_path = public_path() . '/ypathfile/' . $lokasi->gambar;
        unlink($image_path);

        // delete data lokasi
        DB::table('tb_lokasi')->where('id_lokasi', '=', $id)->delete();

        return redirect()->route('lokasis.index')->with('pesan', "Hapus data berhasil");
    }
}
