<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;

class DataremajaController extends Controller
{
    public function index()
    {
        $data = Dataremaja::all();
        // dd($data);
        return view("admin.dataremaja", compact("data"));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(Dataremaja::rules());

        $dataremaja = Dataremaja::create($validatedData);
    }

    public function tambah()
    {
        return view("admin.insertdataremaja");
    }

    public function insert(Request $request)
    {
        $cek = Dataremaja::where('NIK', $request->NIK)->count();
        if($cek > 0)
        {
            return redirect()->route('dataremaja')->with('success' , 'Nik sudah telah terdaftar');
        }
        $data = Dataremaja::create($request->all());
        // dd($data);
        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Dataremaja::find($id);
        // dd($data);
        return view('admin.tampildata', compact('data'));
    }

    public function updatedata(Request $request,$id)
    {
        $data = Dataremaja::find($id);
        $data->update($request->all());

        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah diubah');
    }

    public function deletedata($id)
    {
        $data = Dataremaja::find($id);
        $data->delete();

        return redirect()->route('dataremaja')->with('success' , 'Data Remaja telah dihapus');
    }
}
