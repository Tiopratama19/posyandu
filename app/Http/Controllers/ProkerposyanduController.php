<?php

namespace App\Http\Controllers;

use App\Models\prokerposyandu;
use Illuminate\Http\Request;

class ProkerposyanduController extends Controller
{
    public function index(){
        $tampildata=prokerposyandu::all();
        return view("admin.prokerposyandu",compact('tampildata'));
    }
    //
    public function tambah(){
        return view('admin.insertprokerposyandu');
    }
    public function insert(Request $request)
    {
        $data = $request->all();
        prokerposyandu::create($data);
        return redirect('admin/prokerposyandu');
    }
}