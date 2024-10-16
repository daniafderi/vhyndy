<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $datas = Pengeluaran::all();
    
        // Hitung total pengeluaran hari ini
        $totalHariIni = Pengeluaran::whereDate('tanggal', today())->sum('jumlah');
        
        // Hitung total pengeluaran bulan ini
        $totalBulanIni = Pengeluaran::whereMonth('tanggal', date('m'))
                                    ->whereYear('tanggal', date('Y'))
                                    ->sum('jumlah');

        $datas = Pengeluaran::all();
            // Kirim variabel ke view
        return view('admin.pages.pengeluaran.index', compact('datas', 'totalHariIni', 'totalBulanIni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data ke dalam database
        Pengeluaran::create([
            'tanggal' => $validatedData['tanggal'],
            'nama' => $validatedData['nama'],
            'jumlah' => $validatedData['jumlah'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();
    
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
    
}
