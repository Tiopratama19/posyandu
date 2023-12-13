<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    public function index()
    {
        $data = Riwayat::all();
        // dd($data);
        return view("admin.riwayat", compact("data"));
    }

    public function riwayatdetail($id)
    {
        $data = Riwayat::where('id_dataremaja', $id)->get();
        // dd($data);
        return view("admin.riwayat", compact("data","id"));
    } 

    public function tambah()
    {
        return view("admin.insertriwayat");
    }

    public function insert(Request $request)
    {
        $data = Riwayat::create($request->all());
        // dd($data);
        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Riwayat::find($id);
        // dd($data);
        return view('admin.tampilriwayat', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Riwayat::find($id);
        $data->update($request->all());

        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah diubah');
    }

    public function deletedata($id)
    {
        $data = Riwayat::find($id);
        $data->delete();

        return redirect()->route('riwayatdetail',$data->id_dataremaja)->with('success', 'Data Remaja telah dihapus');
    }
}