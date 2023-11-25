<?php

namespace App\Http\Controllers;

use App\Models\Dataremaja;
use Illuminate\Http\Request;

class DataremajaController extends Controller
{
    public function index (){
        if (request()->ajax()) {
            $remaja = Dataremaja::orderBy('id', 'DESC')->get();

            return DataTables()->of($remaja)
            ->addIndexColumn()
            ->addColumn('action', function($remaja){
                return '<a href="#" class="btn btn-squared btn-info mr-2 mb-2" data-id="'.$remaja->id. '" data-bs-toggle="modal" data-bs-target="#modelId" id="buton_edit"><i class="fa fa-pencil-alt"></i> Edit</a>
                        <a href="#" class="btn btn-squared btn-danger mr-2 mb-2" data-id="'.$remaja->id. '" data-bs-toggle="modal" data-bs-target="#modelId" id="buton_edit"><i class="fa fa-trash-alt"></i> Hapus</a> ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.dataremaja');

    }
    //
    public function tambah (){
        return view('admin.insertdataremaja');
    }
    public function insert(Request $request)
    {
        $data = $request->all();
        Dataremaja::create($data);
        return redirect('admin/dataremaja');
    }
}