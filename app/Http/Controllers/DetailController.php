<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Detail;
use App\Models\Lokasi;
use App\Models\Penilaian;
use App\Models\User;

class DetailController extends Controller
{

    public function __construct()
    {
        $this->Detail = new Detail();
        $this->Lokasi = new Lokasi();
    }

    public function analisacpi()
    {
        $sql = "select `id_penilaian` from tb_detail order by id_detail desc";
        $detail0 = DB::select($sql);
        $id_penilaian = $detail0[0]->id_penilaian;

        //=============================================
        $sql = "select * from tb_detail,tb_lokasi 
		where tb_detail.id_lokasi=tb_lokasi.id_lokasi
		and tb_detail.id_penilaian='$id_penilaian' order by tb_detail.id_detail asc";
        $detail = DB::select($sql);
        $penilaian = DB::select("select * from tb_penilaian where `id_penilaian`='$id_penilaian'");
        return view('admin.proses', ['data1' => $penilaian, 'data2' => $detail, 'id_penilaian' => $id_penilaian]);
    }


    public function fanalisacpi()
    {
        $sql = "select `id_penilaian` from tb_detail order by id_detail desc";
        $detail0 = DB::select($sql);
        $id_penilaian = $detail0[0]->id_penilaian;

        //=============================================
        $sql = "select * from tb_detail,tb_lokasi 
		where tb_detail.id_lokasi=tb_lokasi.id_lokasi
		and tb_detail.id_penilaian='$id_penilaian' order by tb_detail.id_detail asc";
        $detail = DB::select($sql);
        $penilaian = DB::select("select * from tb_penilaian where `id_penilaian`='$id_penilaian'");
        return view('fproses', ['data1' => $penilaian, 'data2' => $detail, 'id_penilaian' => $id_penilaian]);
    }


    public function analisacpihapus($id)
    {
        DB::table('tb_detail')->where('id_detail', '=', $id)->delete();
        return redirect()->route('analisacpi')->with('pesan', "Hapus data berhasil");
    }


    public function index()
    {
        $details = Detail::all();
        $lokasis = Lokasi::all();
        return view('admin.detail.index', ['details' => $details, 'lokasis' => $lokasis]);
    }

    public function cpis(Request $request, $id_penilaian)
    {
        $details = Detail::all();
        $lokasis = Lokasi::all();
        return view('admin.cpi', ['details' => $details, 'lokasis' => $lokasis, 'id_penilaian' => $id_penilaian]);
    }


    public function getDetail(Request $request, $id_penilaian)
    {
        $details = Detail::all();
        $lokasis = Lokasi::all();
        return view('admin.detail.index', ['details' => $details, 'lokasis' => $lokasis, 'id_penilaian' => $id_penilaian]);
    }
    public function fadd(Request $request)
    {
        $ada = 0;
        $count    = $request->counter;

        $nama_penilaian    = $request->nama_penilaian;
        $deskripsi    = $request->deskripsi;
        $id_user    = $request->id_user;

        $penilaian = new Penilaian();
        $penilaian->id_user    = $id_user;
        $penilaian->nama_penilaian  = $nama_penilaian;
        $penilaian->deskripsi       = $deskripsi;
        $penilaian->tanggal         = date("Y-m-d");
        $penilaian->jam             = date("H:i:s");
        $penilaian->status          = "Proses";
        $penilaian->keterangan      = "";
        $penilaian->save();


        $sql = "select `id_penilaian` from tb_penilaian order by id_penilaian desc";
        $detail0 = DB::select($sql);
        $id_penilaian = $detail0[0]->id_penilaian;


        for ($i = 0; $i < $count; $i++) {
            $pilih = 0;
            if (!isset($request->input('pilih')[$i])) {
                $pilih = 0;
            } else {
                $pilih = $request->input('pilih')[$i];

                $id_lokasi = $request->input('id_lokasi')[$i];
                $kriteria1 = $request->input('pil1')[$i];
                $kriteria2 = $request->input('pil2')[$i];
                $kriteria3 = $request->input('pil3')[$i];
                $kriteria4 = $request->input('pil4')[$i];
                $kriteria5 = $request->input('pil5')[$i];
                $kriteria6 = $request->input('pil6')[$i];
                $kriteria7 = $request->input('pil7')[$i];
                //$catatan = $request->input('catatan')[$i];

                $catatan = "";
                if (!isset($request->input('catatan')[$i])) {
                    $catatan = "";
                } else {
                    $catatan = $request->input('catatan')[$i];
                }

                $detail = new Detail();
                $detail->id_penilaian    = $id_penilaian;
                $detail->id_lokasi       = $id_lokasi;
                $detail->kriteria1       = $kriteria1;
                $detail->kriteria2       = $kriteria2;
                $detail->kriteria3       = $kriteria3;
                $detail->kriteria4       = $kriteria4;
                $detail->kriteria5       = $kriteria5;
                $detail->kriteria6       = $kriteria6;
                $detail->kriteria7       = $kriteria7;
                $detail->catatan         = $catatan;

                $detail->save();
                $ada++;
            }
        } //for	
        return redirect()->route('detail.fproses')->with('pesan', "Simpan data berhasil");
    }


    public function add(Request $request)
    {
        $ada = 0;
        $count    = $request->counter;
        $id_penilaian    = $request->id_penilaian;

        for ($i = 0; $i < $count; $i++) {
            $pilih = 0;
            if (!isset($request->input('pilih')[$i])) {
                $pilih = 0;
            } else {
                $pilih = $request->input('pilih')[$i];

                $id_lokasi = $request->input('id_lokasi')[$i];
                $kriteria1 = $request->input('pil1')[$i];
                $kriteria2 = $request->input('pil2')[$i];
                $kriteria3 = $request->input('pil3')[$i];
                $kriteria4 = $request->input('pil4')[$i];
                $kriteria5 = $request->input('pil5')[$i];
                $kriteria6 = $request->input('pil6')[$i];
                $kriteria7 = $request->input('pil7')[$i];
                //$catatan = $request->input('catatan')[$i];

                $catatan = "";
                if (!isset($request->input('catatan')[$i])) {
                    $catatan = "";
                } else {
                    $catatan = $request->input('catatan')[$i];
                }

                $detail = new Detail();
                $detail->id_penilaian    = $id_penilaian;
                $detail->id_lokasi       = $id_lokasi;
                $detail->kriteria1       = $kriteria1;
                $detail->kriteria2       = $kriteria2;
                $detail->kriteria3       = $kriteria3;
                $detail->kriteria4       = $kriteria4;
                $detail->kriteria5       = $kriteria5;
                $detail->kriteria6       = $kriteria6;
                $detail->kriteria7       = $kriteria7;
                $detail->catatan         = $catatan;

                $detail->save();
                $ada++;
            }
        } //for	

        $details = Detail::all();
        $lokasis = Lokasi::all();
        //return view('admin.cpi', ['details' => $details, 'lokasis' => $lokasis, 'id_penilaian' => $id_penilaian]);
        return redirect()->route('detail.proses')->with('pesan', 'Proses Simpan Data CPI berhasil....');
    }
    public function addAAAAAAAAAA(Request $request)
    {
        $ada = 0;
        $count    = $request->counter;
        $id_penilaian    = $request->id_penilaian;


        for ($i = 0; $i < $count; $i++) {

            $id_lokasi = $request->input('id_lokasi')[$i];
            $kriteria1 = $request->input('pil1')[$i];
            $kriteria2 = $request->input('pil2')[$i];
            $kriteria3 = $request->input('pil3')[$i];
            $kriteria4 = $request->input('pil4')[$i];
            $kriteria5 = $request->input('pil5')[$i];
            $kriteria6 = $request->input('pil6')[$i];
            $kriteria7 = $request->input('pil7')[$i];
            //$catatan = $request->input('catatan')[$i];

            $catatan = "";
            if (!isset($request->input('catatan')[$i])) {
                $catatan = "";
            } else {
                $catatan = $request->input('catatan')[$i];
            }

            $detail = new Detail();
            $detail->id_penilaian    = $id_penilaian;
            $detail->id_lokasi       = $id_lokasi;
            $detail->kriteria1       = $kriteria1;
            $detail->kriteria2       = $kriteria2;
            $detail->kriteria3       = $kriteria3;
            $detail->kriteria4       = $kriteria4;
            $detail->kriteria5       = $kriteria5;
            $detail->kriteria6       = $kriteria6;
            $detail->kriteria7       = $kriteria7;
            $detail->catatan         = $catatan;

            $detail->save();
            $ada++;
        } //for	

        $details = Detail::all();
        $lokasis = Lokasi::all();
        return view('admin.cpi', ['details' => $details, 'lokasis' => $lokasis, 'id_penilaian' => $id_penilaian]);

        //return redirect()->route('cpi.index')->with('pesan', 'Proses Simpan Data CPI berhasil....');
    }

    public function store(Request $request)
    {
        $jum    = $request->jum;

        for ($i = 0; $i < $jum; $i++) {
            $detail = new Detail();
            $detail->id_lokasi       = $request->input("id_lokasi$i");
            $detail->kriteria1       = $request->input("pil1$i");
            $detail->kriteria2       = $request->input("pil2$i");
            $detail->kriteria3       = $request->input("pil3$i");
            $detail->kriteria4       = $request->input("pil4$i");
            $detail->kriteria5       = $request->input("pil5$i");
            $detail->kriteria6       = $request->input("pil6$i");
            $detail->kriteria7       = $request->input("pil7$i");
            $detail->catatan         = $request->input("catatan$i");
            $detail->save();
        }

        return redirect()->route('cpi.index')->with('pesan', 'Proses Simpan Data CPI berhasil....');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'id_penilaian'      => 'required|max:50',
            'id_lokasi'         => 'required',
        ]);

        DB::table('tb_detail')
            ->where('id_detail', $id)
            ->update(
                [
                    'id_penilaian'      => $request->id_penilaian,
                    'id_lokasi'         => $request->id_lokasi,
                    'kriteria1'         => $request->kriteria1,
                    'kriteria2'         => $request->kriteria2,
                    'kriteria3'         => $request->kriteria3,
                    'kriteria4'         => $request->kriteria4,
                    'kriteria5'         => $request->kriteria5,
                    'kriteria6'         => $request->kriteria6,
                    'kriteria7'         => $request->kriteria7,
                    'catatan'           => $request->catatan
                ]
            );

        return redirect()->route('details.index')->with('pesan', "Update data berhasil");
    }

    public function destroy($id)
    {
        DB::table('tb_detail')->where('id_detail', '=', $id)->delete();

        return redirect()->route('details.index')->with('pesan', "Hapus data berhasil");
    }





    public function menuPilih(Request $request)
    {
        $ada = 0;
        $count    = $request->counter;
        $id_even = $request->id_even;
        for ($i = 0; $i < $count; $i++) {
            $pilih = 0;
            if (!isset($request->input('pilih')[$i])) {
                $pilih = 0;
            } else {
                $pilih = $request->input('pilih')[$i];
            }
            if ($pilih == 1) {

                $detail = new Detail();
                $detail->id_penilaian    = $id_penilaian;
                $detail->id_lokasi       = $id_lokasi;
                $detail->kriteria1       = $kriteria1;
                $detail->kriteria2       = $kriteria2;
                $detail->kriteria3       = $kriteria3;
                $detail->kriteria4       = $kriteria4;
                $detail->kriteria5       = $kriteria5;
                $detail->kriteria6       = $kriteria6;
                $detail->kriteria7       = $kriteria7;
                //$detail->catatan         = $catatan;

                $catatan = "";
                if (!isset($request->input('catatan')[$i])) {
                    $catatan = "";
                } else {
                    $catatan = $request->input('catatan')[$i];
                }
                $detail->kriteria7       = $kriteria7;
                $detail->save();
                $ada++;
            }
        } //for		
        return redirect()->route('details.index')->with('pesan', 'Proses Simpan Data CPI berhasil....');
    }
}
