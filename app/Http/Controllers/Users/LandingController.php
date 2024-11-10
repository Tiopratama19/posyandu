<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Kegiatankader;
use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Informasi;
use App\Models\Jadwalkonseling;
use App\Models\Kategori;
use App\Models\PesertaKegiatan;
use App\Models\Prokerposyandu;

class LandingController extends Controller
{
    function index()
    {
        $data = [
            'counseling' => Jadwalkonseling::orderBy('TanggalKegiatan', 'DESC')->paginate(3),
            'prokerposyandu' => Informasi::where('jenis', 'kegiatan')->orderBy('created_at', 'ASC')->get(),
            'edukasi' => Informasi::where('jenis', 'edukasi')->orderBy('created_at', 'ASC')->get(),
            'anggota' => Anggota::get()->groupBy('jabatan'),
            'kategori' => Kategori::get(),
        ];

        return view('users.index', $data);
    }

    function detail($id)
    {
        $data = [
            'prokerposyandu' => Prokerposyandu::orderBy('created_at', 'ASC')->where('Status', 'Edukasi')
                ->where('id', $id)
                ->first()
        ];

        return view('users.edukasi.detail', $data);
    }

    public function storePeserta(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'id_informasi' => 'required',
        ]);

        PesertaKegiatan::create($validated);

        return redirect()->back()->with('success', 'Peserta telah didaftarkan')->with('id_informasi', $request->id_informasi);
    }
}
