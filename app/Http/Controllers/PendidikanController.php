<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendidikan = $user->pendidikan()->orderBy('tahun_masuk', 'desc')->get();
        return view('pendidikan.index', compact('user', 'pendidikan'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('pendidikan.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenjang'     => 'required|string|max:50',
            'institusi'   => 'required|string|max:255',
            'jurusan'     => 'nullable|string|max:255',
            'tahun_masuk' => 'nullable|integer|min:1900|max:2099',
            'tahun_lulus' => 'nullable|integer|min:1900|max:2099',
            'ipk'         => 'nullable|string|max:10',
        ]);

        $validated['user_id'] = Auth::id();

        Pendidikan::create($validated);

        return redirect()->route('alumni.pendidikan.index')
            ->with('success', 'Riwayat pendidikan berhasil ditambahkan.');
    }

    public function edit(Pendidikan $pendidikan)
    {
        $user = Auth::user();

        if ($pendidikan->user_id !== $user->id) {
            abort(403);
        }

        return view('pendidikan.edit', compact('user', 'pendidikan'));
    }

    public function update(Request $request, Pendidikan $pendidikan)
    {
        if ($pendidikan->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'jenjang'     => 'required|string|max:50',
            'institusi'   => 'required|string|max:255',
            'jurusan'     => 'nullable|string|max:255',
            'tahun_masuk' => 'nullable|integer|min:1900|max:2099',
            'tahun_lulus' => 'nullable|integer|min:1900|max:2099',
            'ipk'         => 'nullable|string|max:10',
        ]);

        $pendidikan->update($validated);

        return redirect()->route('alumni.pendidikan.index')
            ->with('success', 'Riwayat pendidikan berhasil diperbarui.');
    }

    public function destroy(Pendidikan $pendidikan)
    {
        if ($pendidikan->user_id !== Auth::id()) {
            abort(403);
        }

        $pendidikan->delete();

        return redirect()->route('alumni.pendidikan.index')
            ->with('success', 'Riwayat pendidikan berhasil dihapus.');
    }
}
