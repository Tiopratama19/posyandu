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
        if($request->ajax()){
            $request->validate([
                'image'=>'required|mimes:jpg,jpeg,png,gif,svg'
             ]);
             if($image = $request->file('image')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('edukasikegiatan', $imageName);
             }
             Prokerposyandu::create([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'image'=>$imageName,
                'Status' => $request->Status,
                'StatusLanding' => $request->StatusLanding
             ]);
             return response()->json([
                'status'=>'success'
             ]);
        }
        // dd($data);
    }

    public function tampildata($id)
    {
        $data = Prokerposyandu::find($id);
        // dd($data);
        return view('admin.tampilproker', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {

        if (empty($request->file('image'))) {
            $data = Prokerposyandu::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'Status' => $request->Status,
                'StatusLanding' => $request->StatusLanding
            ]);
            return response()->json([
                'status'=>'success'
            ]);
        } else {
            if($image = $request->file('image')){
                $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('edukasikegiatan', $imageName);
             }

            $data = Prokerposyandu::find($id);
            $data->update([
                'Nama' => $request->Nama,
                'Tanggal' => $request->Tanggal,
                'Kegiatan' => $request->Kegiatan,
                'Caption' => $request->Caption,
                'image'=>$imageName,
                'Status' => $request->Status,
                'StatusLanding' => $request->StatusLanding
            ]);
            return response()->json([
                'status'=>'success'
            ]);
        }
    }

    public function deletedata($id)
    {
        $data = Prokerposyandu::find($id);
        $data->delete();

        return redirect()->route('prokerposyandu')->with('success', 'Proker telah dihapus');
    }
}
