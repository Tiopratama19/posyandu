<?php

namespace App\Http\Controllers;

use App\Models\kegiatankader;
use Illuminate\Http\Request;

class KegiatanKaderController extends Controller
{
    public function index(){
        $tampildatakegiatan=kegiatankader::all();
        return view("admin.kegiatankader", compact("tampildatakegiatan"));
    }
    public function tambahkegiatan(){
        return view('admin.insertkegiatankader');
    }
    public function insert(Request $request){
        $data = $request->all();
        kegiatankader::create($data);
        return redirect('admin/kegiatankader');
    }
}