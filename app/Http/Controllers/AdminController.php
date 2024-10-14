<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        if ($request->input()) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
        } else {
            $start_date = date('Y-m-d');
            $end_date = date('Y-m-d');
        }
    
        // Mengambil daftar semua proyek bersama dengan statusnya
        $projects = Project::with('status')
                            ->where('status_id', 4)
                            ->whereDate('created_at', '>=', $start_date)
                            ->whereDate('created_at', '<=', $end_date)
                            ->get();
    
        // Menghitung total pendapatan hanya dari proyek yang memiliki status "sudah dibayar"
        $totalPendapatan = Project::where('status_id', 4)
                                   ->whereDate('created_at', '>=', $start_date)
                                   ->whereDate('created_at', '<=', $end_date)
                                   ->sum('harga_total');
    
        // Mengembalikan tampilan dengan variabel yang diperlukan
        return view('admin.pages.rekap.index', compact('projects', 'start_date', 'end_date', 'totalPendapatan'));
    }
    
    
    

    public function login() {
        return redirect()->route('login');
    }



    
    
}
