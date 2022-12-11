<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use App\Models\Hasil;
use App\Models\Penilaian;
use App\Models\Lokasi;

class HasilController extends Controller{
    public function index() {

        // $hasils = DB::table('tb_hasil as a')
        //     ->join('tb_hasil as b', 'a.id_hasil', '=', 'b.id_penilaian', 'c.id_lokasi')
        //     ->get();

        // $penilaians = DB::table('tb_penilaian as a')
        //     ->select(DB::raw("CONCAT(a.nama_penilaian) AS nama_penilaian"), 'b.id_penilaian')
        //     ->pluck('nama_penilaian', 'id_penilaian')
        //     ->all();

        // $lokasis = DB::table('tb_lokasi as a')
        //     ->select(DB::raw("CONCAT(a.nama_lokasi) AS nama_lokasi"), 'c.id_lokasi')
        //     ->pluck('nama_lokasi', 'id_lokasi')
        //     ->all();

        // return view('admin.penilaian.index', ['hasils' => $hasils, 'penilaians' => $penilaians, 'lokasis' => $lokasis]);

        $penilaians = Penilaian::all();
        return view('admin.hasil.index', ['penilaians' => $penilaians]);
    }
 public function fhasil() {
	$userid=Session::get('userid');
	$nama_user=Session::get('nama_user');
	$telepon=Session::get('telepon');
	$email=Session::get('email');
	
	 $sql = "select * from tb_penilaian  where  id_user='$userid' order by  id_penilaian desc";
		 $penilaians = DB::select($sql);
		
	/*
	 $sql = "select * from tb_penilaian,tb_lokasi,tb_hasil 
		where tb_hasil.id_penilaian=tb_penilaian.id_penilaian
		and tb_hasil.id_lokasi=tb_lokasi.id_lokasi 
		and tb_penilaian.id_pelanggan='$pelangganid' order by tb_hasil.id_hasil asc";
		 $detail = DB::select($sql);
		*/
        

        //$hasils = Hasil::all();
        return view('fhasil', ['penilaians' => $penilaians,'userid'=>$userid]);
    }
	
	
    public function store(Request $request)  {
        $request->validate([
            'id_penilaian' => 'required',
            'id_lokasi'    => 'required',
        ]);

        $hasil = new Hasil();
        $hasil->id_penilaian   = $request->id_penilaian;
        $hasil->id_lokasi      = $request->id_lokasi;
        $hasil->hasil          = $request->hasil;
        $hasil->rekapitulasi   = $request->rekapitulasi;
        $hasil->bobot          = $request->bobot;
        $hasil->keterangan     = $request->keterangan;
        $hasil->save();

        return redirect()->route('hasils.index')->with('pesan', 'Simpan Data hasil Berhasil.');
    }

    public function update(Request $request, $id){
        $validateData = $request->validate([
            'id_penilaian' => 'required|max:50',
            'id_lokasi'    => 'required',
        ]);

        DB::table('tb_hasil')
            ->where('id_hasil', $id)
            ->update(
                [
                    'id_penilaian' => $request->id_penilaian,
                    'id_lokasi'    => $request->id_lokasi,
                    'hasil'        => $request->hasil,
                    'bobot'        => $request->bobot,
                    'rekapitulasi' => $request->rekapitulasi,
                    'keterangan'   => $request->keterangan
                ]
            );

        return redirect()->route('hasils.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id) {
        DB::table('tb_hasil')->where('id_hasil', '=', $id)->delete();

        return redirect()->route('hasils.index')->with('pesan', "Hapus data berhasil");
    }
}
