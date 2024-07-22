<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwalkonseling;
use App\Http\Controllers\Controller;
use App\Models\PesertaKonseling;
use App\Models\Dataremaja;
class JadwalKonselingController extends Controller
{
    public function index()
    {
        $data = Jadwalkonseling::orderBy('TanggalKegiatan', 'DESC')->get();
        // dd($data);
        return view("admin.jadwalkonseling", compact("data"));
    }

    public function tambah()
    {
        return view("admin.insertjadwalkonseling");
    }

    public function insert(Request $request)
    {
        $data = Jadwalkonseling::create($request->all());
        // dd($data);
        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah ditambahkan');
    }

    public function tampildata($id)
    {
        $data = Jadwalkonseling::find($id);
        // dd($data);
        return view('admin.tampiljadwal', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Jadwalkonseling::find($id);
        $data->update($request->all());

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah diubah');
    }

    public function deletedata($id)
    {
        $data = Jadwalkonseling::find($id);
        $data->delete();

        $data_peserta = PesertaKonseling::where('id_konselings', $id)->first();
        $data_peserta->delete();

        return redirect()->route('jadwalkonseling')->with('success', 'Jadwal telah dihapus');
    }

    public function tambahpeserta(Request $request, $id)
    {
        $peserta = PesertaKonseling::where('id_konselings', $id)
        ->where('nik', $request->nik)
        ->count();
        if ($peserta == 0) {
              $pesertakonselingnew = New PesertaKonseling;
              $pesertakonselingnew->nik = $request->nik;
              $pesertakonselingnew->nama = $request->nama;
              $pesertakonselingnew->email = $request->email;
              $pesertakonselingnew->id_konselings = $id;
              $pesertakonselingnew->save();
              return response()->json(['status' => 1], 201);
        } else {
            return response()->json(['status' => 2], 201);
        }
    }

    function getPeserta(Request $request, $id)
    {
        if (request()->ajax()) {
            $data = PesertaKonseling::where('id_konselings', $id)->get();

            return DataTables()->of($data)
            ->addColumn('nik', function($data){
                return $this->sensor($data->nik);
            })
            ->addColumn('email', function($data){
                return $this->sensor($data->email);
            })

            ->rawColumns(['nik', 'email'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    private function sensor( $data = '' )
    {
        if ($data == '') {
            return "-";
        } else {
            $sensor = substr($data,0,3);
            $censored = 'X';
            for ($i=0; $i < strlen($data)-4; $i++) {
                $censored .= "X";
            }
            return $sensor.$censored;
        }
    }
}
