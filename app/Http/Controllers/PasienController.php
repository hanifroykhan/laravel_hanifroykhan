<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = Pasien::with('rumah_sakit');

        if ($request->has('rumah_sakit_id')) {
            $pasien->where('rumah_sakit_id', $request->input('rumah_sakit_id'));
        }

        $rs = RumahSakit::orderBy('nama_rs')->get();

        $pasien = $pasien->get();

        return view('Pasien.index', compact('pasien', 'rs'));
    }

    public function create()
    {
        $rs = RumahSakit::orderBy('nama_rs')->get();

        return view('Pasien.create', compact('rs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|max:255',
            'alamat_pasien' => 'required|max:255',
            'telpon_pasien' => 'required|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakit,id',
        ]);

        Pasien::create($request->all());

        return redirect()->route('indexPasien')->with('success', 'Pasien Berhasil Dibuat');
    }

    public function edit(Pasien $pasien)
    {
        $rumahSakit = RumahSakit::orderBy('nama_rs')->get();
        return view('Pasien.edit', compact('pasien', 'rumahsakit'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien' => 'required|max:255',
            'alamat_pasien' => 'required|max:255',
            'telpon_pasien' => 'required|max:20',
            'rumah_sakit_id' => 'required|exists:rumah_sakit,id',
        ]);

        $pasien->update($request->all());

        return redirect()->route('indexPasien')->with('success', 'Pasien Telah Diupdate');
    }

    public function destroy(Request $request, Pasien $pasien)
    {
        $pasien->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('indexPasien')->with('success', 'Pasien Berhasil Dihapus');
    }

}
