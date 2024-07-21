<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Kegiatankader;
use App\Models\Prokerposyandu;
use App\Models\JadwalKonseling;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    function index()
    {
        $data = [
            'counseling' => JadwalKonseling::orderBy('TanggalKegiatan', 'DESC')->paginate(3),
            'prokerposyandu' => Prokerposyandu::orderBy('created_at', 'ASC')->get(),
            'anggota' => Kegiatankader::get()->groupBy('Jabatan'),
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
}
