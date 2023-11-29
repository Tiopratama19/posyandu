<?php

namespace App\Http\Controllers;

use App\Models\prokerposyandu;
use Illuminate\Http\Request;

class ProkerposyanduController extends Controller
{
    public function index(){
        $tampilproker = prokerposyandu::all();
        return view("admin.prokerposyandu", compact("tampilproker"));
    }
    public function tambahproker(){
        return view('admin.insertprokerposyandu');
    }
    public function insertproker(Request $request){
        $data = $request->all();
        prokerposyandu::create($data);
        return redirect('admin/prokerposyandu');
    }
}