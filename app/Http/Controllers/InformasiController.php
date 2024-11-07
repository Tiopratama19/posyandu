<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $data = Informasi::get();
        return view("admin.informasi.index", compact("data"));
    }

    public function create()
    {
        $form = [
            'title' => 'Tambah Informasi',
            'action' => route('informasi.store'),
            'method' => 'POST'
        ];

        return view("admin.informasi.form", compact("form"));
    }

    public function edit($id)
    {
        $form = [
            'title' => 'Edit Informasi',
            'action' => route('informasi.update', $id),
            'method' => 'PUT'
        ];

        $item = Informasi::find($id);

        return view("admin.informasi.form", compact('form', 'item'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'deskripsi' => 'required',
            'galeri' => 'required',
        ]);

        if ($request->file('galeri')) {
            $validated['galeri'] = $request->file('galeri')->storeAs('galeri', $request->file('galeri')->hashName());
        }

        Informasi::create($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'deskripsi' => 'required',
        ]);

        if ($request->file('galeri')) {
            $validated['galeri'] = $request->file('galeri')->storeAs('galeri', $request->file('galeri')->hashName());
        }

        Informasi::find($id)
            ->update($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        Informasi::find($id)->delete();

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
