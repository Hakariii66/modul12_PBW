<?php

namespace App\Http\Controllers;

use App\Models\publikasi as ModelsPublikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class publikasi extends Controller
{
    public function index()
    {
        $publikasi = ModelsPublikasi::all();
        return view('publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('publikasi.tambah-publikasi');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $validated['sampul'] = $this->simpanSampul($request->file('sampul'));
        }

        ModelsPublikasi::create($validated);

        return redirect()->route('publikasi')->with('success', 'Publikasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $publikasi = ModelsPublikasi::findOrFail($id);

        return view('publikasi.edit-publikasi', compact('publikasi'));
    }

    public function update(Request $request, $id)
    {
        $publikasi = ModelsPublikasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $this->hapusSampul($publikasi->sampul);
            $validated['sampul'] = $this->simpanSampul($request->file('sampul'));
        }

        $publikasi->update($validated);

        return redirect()->route('publikasi')->with('success', 'Publikasi berhasil diubah.');
    }

    public function destroy($id)
    {
        $publikasi = ModelsPublikasi::findOrFail($id);

        $this->hapusSampul($publikasi->sampul);
        $publikasi->delete();

        return redirect()->route('publikasi')->with('success', 'Publikasi berhasil dihapus.');
    }

    private function simpanSampul($file)
    {
        $nama = time() . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $nama);

        return $nama;
    }

    private function hapusSampul($nama)
    {
        if ($nama && File::exists(public_path('images/' . $nama))) {
            File::delete(public_path('images/' . $nama));
        }
    }
}
