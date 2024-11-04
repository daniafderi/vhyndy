<?php

namespace App\Http\Controllers;
use Carbon\Carbon; // Pastikan di bagian atas file
use App\Models\Category;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Project;
use App\Models\Sparepart;
use App\Models\Status;

class AdminController extends Controller
{
    public function index() {
        $projects = Project::limit(10)->orderBy('id', 'desc')->get();
        $modals = DB::table('projects')->rightJoin('statuses', 'projects.status_id', '=', 'statuses.id')->selectRaw('statuses.id, statuses.name, count(projects.status_id) as jumlah')->groupBy('id', 'name', 'status_id')->get();

        return view('admin.dashboard', ['projects' => $projects, 'modals' => $modals, 'active' => 'dashboard']);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'image' => 'required',
            'harga_total' => 'required',
            'status_id' => 'required',
            'category_id' => 'required'
        ]);

        
        Project::create($request->all());

        return redirect()->route('dashboard.index');
    }

    public function search(Request $request) {
        $q = $request->search;
        $projects = Project::where('code_project', 'like', '%'.$q.'%')->get();

        return view('admin.pages.project.filter.search', compact('projects', 'q'));
    }

    public function searchSparepart(Request $request) {
        $q = $request->search;
        $spareparts = Sparepart::where('name', 'like', '%'.$q.'%')->get();

        return view('admin.pages.sparepart.filter.search', compact('spareparts', 'q'));
    }

    public function pendapatan(Request $request) {
        // Mendapatkan tanggal pertama dan terakhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

            // Mengambil total pendapatan servis bulan ini hanya untuk yang sudah dibayar

        $totalPendapatanService = Project::whereBetween('tanggal_pembayaran', [$startOfMonth, $endOfMonth])
        ->where('status_id', 4) // Hanya proyek yang sudah dibayar
        ->sum('harga_total');

        // Mengambil total pengeluaran bulan ini
        $totalPengeluaranBulanIni = Pengeluaran::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->sum('jumlah');

        // Mengambil daftar semua proyek bersama dengan statusnya
        $projects = Project::orderBy('tanggal_servis', 'desc')->paginate(10);
        $pengeluarans = Pengeluaran::orderBy('tanggal', 'desc')->paginate(10);

        // Menghitung total servis bulan ini
        $totalServiceBulanIni = Project::whereMonth('tanggal_servis', date('m'))
                                        ->whereYear('tanggal_servis', date('Y'))
                                        ->count('id');

        // Mengembalikan tampilan dengan variabel yang diperlukan
        return view('admin.pages.rekap.index', [
            'projects' => $projects,
            'totalPendapatanService' => $totalPendapatanService,
            'totalPengeluaranBulanIni' => $totalPengeluaranBulanIni,
            'totalServiceBulanIni' => $totalServiceBulanIni,
            'pengeluarans' => $pengeluarans,
            'start_date' => $startOfMonth,
            'end_date' => $endOfMonth
        ]);
    }
    
    
    

    public function login() {
        return redirect()->route('login');
    }



    
    
}
