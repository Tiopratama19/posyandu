<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prokerposyandu;
use App\Http\Controllers\Controller;

class ProkerposyanduController extends Controller
{
    public function index()
    {
        $data = Prokerposyandu::all();
        // dd($data);
        return view("admin.prokerposyandu", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertprokerposyandu");
    }

    public function insert(Request $request)
    {
        $data = Prokerposyandu::create($request->all());
        // dd($data);
        return redirect()->route('prokerposyandu')->with('success', 'Proker telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Prokerposyandu::find($id);
        // dd($data);
        return view('admin.tampilproker', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Prokerposyandu::find($id);
        $data->update($request->all());

        return redirect()->route('prokerposyandu')->with('success', 'Proker telah diubah');
    }

    public function deletedata($id)
    {
        $data = Prokerposyandu::find($id);
        $data->delete();

        return redirect()->route('prokerposyandu')->with('success', 'Proker telah dihapus');
    }
}