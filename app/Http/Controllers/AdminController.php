<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Redirect;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', ['admins' => $admins]);
    }

    public function postAdd(Request $request)
    {
        $request->validate([
            'nama_admin' => 'required',
            'telepon'    => 'required',
            'email'      => 'required',
        ]);

        $admin = new Admin();
        $admin->nama_admin   = $request->nama_admin;
        $admin->telepon      = $request->telepon;
        $admin->email        = $request->email;
        $admin->username     = $request->username;
        $admin->password     = $request->password;
        $admin->status       = $request->status;
        $admin->keterangan   = $request->keterangan;
        $admin->save();

        //return redirect()->route('admins.index')->with('pesan', 'Simpan Data admin Berhasil.');
        return Redirect::action('App\Http\Controllers\AdminController@index');
    }

    public function postUpdate(Request $request, $id)
    {

        $validateData = $request->validate([
            'nama_admin'    => 'required|max:50',
            'telepon'       => 'required',
            'email'         => 'required',
            'password'      => 'required',
        ]);

        DB::table('tb_admin')
            ->where('id_admin', $id)
            ->update(
                [
                    'nama_admin'  => $request->nama_admin,
                    'telepon'     => $request->telepon,
                    'email'       => $request->email,
                    'username'    => $request->username,
                    'password'    => $request->password,
                    'status'      => $request->status,
                    'keterangan'  => $request->keterangan
                ]
            );
        return Redirect::action('App\Http\Controllers\AdminController@index');
        //return redirect()->route('admins.index')->with('pesan', "Update data berhasil");
    }


    public function delete($id)
    {
        DB::table('tb_admin')->where('id_admin', '=', $id)->delete();

        return Redirect::action('App\Http\Controllers\AdminController@index');
        // return redirect()->route('admins.index')->with('pesan', "Hapus data berhasil");
    }
}
