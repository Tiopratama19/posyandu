<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;

class DataremajaController extends Controller
{
    public function index (){
        $tampildata=Dataremaja::all();
        return view("admin.dataremaja",compact("tampildata") );
    }
    //
    public function tambah (){
        return view ('admin.insertdataremaja');
    }
    public function insert(Request $request)
    {
        $data = $request->all();
        Dataremaja::create($data);
        return redirect('admin/dataremaja');
    }
}