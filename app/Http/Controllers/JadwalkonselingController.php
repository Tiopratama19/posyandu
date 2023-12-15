<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwalkonseling;
use App\Http\Controllers\Controller;

class JadwalKonselingController extends Controller
{
    public function index()
    {
        $data = Jadwalkonseling::orderBy('TanggalKegiatan', 'DESC')->get();
        // dd($data);
        return view("admin.jadwalkonseling", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertjadwalkonseling");
    }

    public function insert(Request $request)
    {
        $data = Jadwalkonseling::create($request->all());
        // dd($data);
        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Jadwalkonseling::find($id);
        // dd($data);
        return view('admin.tampiljadwal', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Jadwalkonseling::find($id);
        $data->update($request->all());

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah diubah');
    }

    public function deletedata($id)
    {
        $data = Jadwalkonseling::find($id);
        $data->delete();

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah dihapus');
    }
}
