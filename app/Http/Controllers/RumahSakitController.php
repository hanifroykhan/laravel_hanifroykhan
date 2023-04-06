<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakit = RumahSakit::orderBy('nama_rs')->get();
        return view('RumahSakit.index', compact('rumahSakit'));
    }

    public function create()
    {
        return view('RumahSakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rs' => 'required|max:255',
            'alamat_rs' => 'required|max:255',
            'email_rs' => 'required|max:100',
            'telpon_rs' => 'required|max:20',
        ]);

        RumahSakit::create($request->all());

        return redirect()->route('indexRS')->with('success', 'Rumah Sakit Berhasil di buat');
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('RumahSakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama_rs' => 'required|max:255',
            'alamat_rs' => 'required|max:255',
            'email_rs' => 'required|max:100' . $rumahSakit->id,
            'telpon_rs' => 'required|max:20',
        ]);

        $rumahSakit->update($request->all());
        return redirect()->route('indexRS')->with('success', 'Rumah Sakit berhasil Dibuat');
    }

    public function destroy(Request $request, RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('indexRS')->with('success', 'Rumah Sakit Berhasil di hapus');
    }

}
