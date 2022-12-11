<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Detail;
use App\Models\Lokasi;

class CpiController extends Controller
{
    public function __construct()
    {
        $this->Detail = new Detail();
        $this->Lokasi = new Lokasi();
    }

    public function index()
    {
        $details = Detail::all();
        $lokasis = Lokasi::all();
        return view('admin.detail.index', ['details' => $details, 'lokasis' => $lokasis]);
    }

    public function store(Request $request)
    {
        // $jum    = 4;//$request->jum;
        //	for($i=0;$i<$jum;$i++){CpiController

        $i = 0;
        $detail = new Detail();
        $detail->id_penilaian    = $request->input("id_penilaian$i");
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
        //}

        return redirect()->route('cpis.index')->with('pesan', 'Proses Simpan Data CPI berhasil....');

        //$details = Detail::all();
        //$lokasis = Lokasi::all();
        //return view('admin.cpi', ['details' => $details,'lokasis' => $lokasis]);

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
}
