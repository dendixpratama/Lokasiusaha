<?php

namespace App\Http\Controllers;
use Session;
use DB;
use App\Job;
use App\Models\Lokasi;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

/*
Session::put('v_login',  TRUE);
Session::get('v_login')
if (!Session::get('v_login')) {
            return redirect('v_login')->with('success', 'Silahkan Login terlebih dahulu');
        } else {
            return view('admin.dashboard');
}

  Session::put('pelangganid', $data->id_pelanggan);
                Session::put('nama_pelanggan',   $data->nama_pelanggan);
                Session::put('telepon',    $data->telepon);
                Session::put('email',      $data->email);
$pelangganid=Session::get('pelangganid');
$nama_pelanggan=Session::get('nama_pelanggan');
$telepon=Session::get('telepon');
$email=Session::get('email');

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

*/
class DashboardController extends Controller
{
    public function dashboard_Admin()
    {
        return view('admin.dashboard');
    }

    public function dashboard_user()
    {
        return view('dashboard');
    }

    public function plokasi()  {
        $lokasis = Lokasi::all();
		$txt1="";
		$txt2="";
        return view('lokasi', ['lokasi' => $lokasis,'txt1' => $txt1,'txt2' => $txt2]);
    }
	
	public function cari1(Request $request)  {
        $lokasis = Lokasi::all();
		$txt1= $request->txt1;
        $txt2= $request->txt2;
		
		if(strlen($txt1)>1 && strlen($txt2)>3){
		 $sql = "select * from tb_lokasi  where 
		 (nama_lokasi like '%$txt1%' or `alamat` like '%$txt1%') and `harga`<='$txt2' order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		else if(strlen($txt1)>1 && strlen($txt2)<1){
		 $sql = "select * from tb_lokasi  where 
		 (nama_lokasi like '%$txt1%' or `alamat` like '%$txt1%')  order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		 else if(strlen($txt1)<1 && strlen($txt2)>3){
		 $sql = "select * from tb_lokasi  where  `harga`<='$txt2' order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		 
        return view('lokasi', ['lokasi' => $lokasis,'txt1' => $txt1,'txt2' => $txt2]);
    }

    public function detailrk($id)  {
        $lokasis = DB::table('tb_lokasi as a')
            ->where('a.id_lokasi', $id)->first();


        return view('detail', ['lokasi' => $lokasis]);
    }

    public function fpenilaian() {
        //$details = Detail::all();
        $lokasis = Lokasi::all();
        //return view('fpenilaian', ['details' => $details, 'lokasis' => $lokasis]);
		
		
		$userid=Session::get('userid');
		$nama_user=Session::get('nama_user');
		$telepon=Session::get('telepon');
		$email=Session::get('email');
		$atas="$nama_user |IDPL-0$userid";
		$bawah="$email";
		
		$txt1="";
		$txt2=""; 
		return view('fpenilaian', ['lokasis' => $lokasis,'userid'=>$userid,'bawah'=>$bawah,'atas'=>$atas,'txt1' => $txt1,'txt2' => $txt2]);
    }
	
	 public function cari2(Request $request) {
        //$details = Detail::all();
        $lokasis = Lokasi::all(); 
		
		$txt1= $request->txt1;
        $txt2= $request->txt2;
		$userid=Session::get('userid');
		$nama_user=Session::get('nama_user');
		$telepon=Session::get('telepon');
		$email=Session::get('email');
		$atas="$nama_user |IDPL-0$userid";
		$bawah="$email";
		
		
		
		if(strlen($txt1)>1 && strlen($txt2)>3){
		 $sql = "select * from tb_lokasi  where 
		 (nama_lokasi like '%$txt1%' or `alamat` like '%$txt1%') and `harga`<='$txt2' order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		else if(strlen($txt1)>1 && strlen($txt2)<1){
		 $sql = "select * from tb_lokasi  where 
		 (nama_lokasi like '%$txt1%' or `alamat` like '%$txt1%')  order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		 else if(strlen($txt1)<1 && strlen($txt2)>3){
		 $sql = "select * from tb_lokasi  where  `harga`<='$txt2' order by  `nama_lokasi` asc";
		$lokasis = DB::select($sql);
		}
		
		return view('fpenilaian', ['lokasis' => $lokasis,'userid'=>$userid,'bawah'=>$bawah,'atas'=>$atas,'txt1' => $txt1,'txt2' => $txt2]);
    }
}
