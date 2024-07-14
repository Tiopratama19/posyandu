<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prokerposyandu;
use App\Models\JadwalKonseling;
class LandingController extends Controller
{
    function index()
    {
        $data = [
            'counseling' => JadwalKonseling::orderBy('TanggalKegiatan', 'DESC')->paginate(3),
            'prokerposyandu' => prokerposyandu::orderBy('created_at', 'ASC')->where('Status', 'Edukasi')->get()
        ];

        return view('users.index', $data);
    }

    function detail($id)
    {
        $data = [
            'prokerposyandu' => prokerposyandu::orderBy('created_at', 'ASC')->where('Status', 'Edukasi')
            ->where('id', $id)
            ->first()
        ];
        return view('users.edukasi.detail', $data);
    }
}
