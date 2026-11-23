<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ProgramController extends Controller
{
    private function rules(): array
    {
        return [
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'meta'      => 'required|string|max:255',
            'url'       => 'nullable|url|max:500',
            'gambar'    => 'nullable|url|max:500',
            'deadline'  => 'nullable|date',
        ];
    }

    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'url'      => ':attribute harus berupa link yang valid (diawali http:// atau https://).',
            'date'     => ':attribute harus berupa tanggal yang valid.',
            'max'      => ':attribute terlalu panjang.',
        ];
    }

    // READ: tampilkan semua data
    public function index(): View
    {
        $programs = Beasiswa::query()
            ->orderByRaw('deadline IS NULL')
            ->orderBy('deadline')
            ->get();

        return view('program.index', compact('programs'));
    }

    // FORM: tampilkan form tambah
    public function create(): View
    {
        return view('program.create');
    }

    // CREATE: simpan data baru
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules(), $this->messages());

        Beasiswa::create($data);

        return redirect()->route('program.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    // FORM EDIT: tampilkan form ubah
    public function edit($id): View
    {
        $program = Beasiswa::findOrFail($id);

        return view('program.edit', compact('program'));
    }

    // UPDATE: simpan perubahan
    public function update(Request $request, $id): RedirectResponse
    {
        $program = Beasiswa::findOrFail($id);
        $data = $request->validate($this->rules(), $this->messages());

        $program->update($data);

        return redirect()->route('program.index')
            ->with('success', 'Data berhasil diubah.');
    }

    // DELETE: hapus data
    public function destroy($id): RedirectResponse
    {
        Beasiswa::findOrFail($id)->delete();

        return redirect()->route('program.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}