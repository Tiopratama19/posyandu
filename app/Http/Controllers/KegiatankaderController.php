<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatankader;
use App\Http\Controllers\Controller;

class KegiatankaderController extends Controller
{
    public function index()
    {
        $data = Kegiatankader::all();
        // dd($data);
        return view("admin.kegiatankader", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertkegiatankader");
    }

    public function insert(Request $request)
    {
        $data = Kegiatankader::create($request->all());
        // dd($data);
        return redirect()->route('kegiatankader')->with('success', 'Kegiatan telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Kegiatankader::find($id);
        // dd($data);
        return view('admin.tampilkegiatan', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Kegiatankader::find($id);
        $data->update($request->all());

        return redirect()->route('kegiatankader')->with('success', 'Kegiatan telah diubah');
    }

    public function deletedata($id)
    {
        $data = Kegiatankader::find($id);
        $data->delete();

        return redirect()->route('kegiatankader')->with('success', 'Kegiatan telah dihapus');
    }
}