<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Counseling;
class LandingController extends Controller
{
    function index()
    {
        // $data = [
        //     'counseling' => Counseling::orderBy('TanggalKegiatan', 'DESC')->paginate(3),
        // ];

        return view('users.index');
    }
}
