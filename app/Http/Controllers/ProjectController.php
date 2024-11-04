<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Resources\ProjectCreateResource;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Status;
use App\Models\Category;
use App\Models\History;
use App\Models\Sparepart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() {

        $projects = Project::orderBy('id', 'desc')->paginate(10);

        return view('admin.pages.project.index', ['projects' => $projects]);
    }

    public function create() {

        $statuses = Status::all();
        $categories = Category::all();
        $spareparts = Sparepart::all();
        $invoice = "INV-".date('YmdHis');
        $now = now()->format('Y-m-d');

        return view('admin.pages.project.create', compact(['statuses', 'categories', 'spareparts', 'invoice', 'now']));
    }

    public function store(Request $request) {

        //dd($request);

        $validatedData = $request->validate([
            "invoice" => "required|string",
            "judul_servis" => "required|string|max:50",
            "tanggal_servis" => "required|date",
            "nama_pelanggan" => "required|string",
            "status_id" => "required",
            "category_id" => "required",
            "merek_perangkat" => "required|string",
            "type_perangkat" => "required|string",
            "kelengkapan" => "required|string",
            "kerusakan" => "required|string",
            "penggunaan_sparepart" => "required|string",
            "harga_sparepart" => "required",
            "harga_jual_sparepart" => "required",
            "harga_jasa" => "required",
            "harga_total" => "required",
            "jumlah_sudah_dibayar" => "required",
            "jumlah_belum_dibayar" => "required",
            "metode_pembayaran" => "required",
            "alamat_pelanggan" => "string|nullable",
            "kontak_pelanggan" => "string|nullable",
            "sparepart_digunakan" => "string|nullable"
        ]);

        History::create([
            'nama_user' => Auth::user()->name,
            'aktifitas' => Auth::user()->name.' menambahkan data project pada '.now()
        ]);

        if($request->foto_perangkat) {
            $validatedData["foto_perangkat"] = $request->file('foto_perangkat')->store('project-image');
        }
        
        Project::create($validatedData);

        if($request->sparepart) {
            $newProjectId = Project::latest()->first()->id;
        
            $pssp = Project::find($newProjectId);
            $pssp->sparepart()->sync($request->sparepart);
        }
        return redirect()->route('project.index')->with('success', 'Berhasil menambahkan data');
        

        
    }

    public function edit($id) {

        $project = Project::find($id);
        $statuses = Status::all();
        $categories = Category::all();
        $spareparts = Sparepart::all();

        return view('admin.pages.project.edit', compact(['project', 'statuses', 'categories', 'spareparts']));
    }

    public function update(Request $request, $id) {
        $project = Project::find($id);

        $validatedData = $request->validate([
            "invoice" => "required|string",
            "judul_servis" => "required|string|max:50",
            "tanggal_servis" => "required|date",
            "nama_pelanggan" => "required|string",
            "status_id" => "required",
            "category_id" => "required",
            "merek_perangkat" => "required|string",
            "type_perangkat" => "required|string",
            "kelengkapan" => "required|string",
            "kerusakan" => "required|string",
            "penggunaan_sparepart" => "required|string",
            "harga_sparepart" => "required",
            "harga_jual_sparepart" => "required",
            "harga_jasa" => "required",
            "harga_total" => "required",
            "jumlah_sudah_dibayar" => "required",
            "jumlah_belum_dibayar" => "required",
            "metode_pembayaran" => "required",
            "alamat_pelanggan" => "string|nullable",
            "kontak_pelanggan" => "string|nullable",
            "sparepart_digunakan" => "string|nullable"
        ]);

        if($request->file('foto_perangkat')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData["foto_perangkat"] = $request->file('foto_perangkat')->store('project-image');
        } 

        // Update tanggal_pembayaran jika status_id adalah '4' (sudah dibayar)
        if ($request->status_id == 4) {
            $validatedData['tanggal_pembayaran'] = now(); // Mengisi tanggal_pembayaran dengan tanggal sekarang
        } else {
            // Jika status_id bukan 4, kita bisa mengosongkan tanggal_pembayaran (opsional)
            $validatedData['tanggal_pembayaran'] = null; // Atau tetap tidak diubah
        }


        $project->update($validatedData);

        History::create([
            'nama_user' => Auth::user()->name,
            'aktifitas' => Auth::user()->name.' merubah data project dengan judul '.$request->name.' pada '.now()
        ]);

        if($request->sparepart) {
            $project->sparepart()->sync($request->sparepart);
        }
        return redirect()->route('project.index')->with('success', 'Berhasil memperbarui data');
    }

    public function destroy($id) {

        $project = Project::find($id);

        $project->sparepart()->detach();

        $project->delete();

        History::create([
            'nama_user' => Auth::user()->name,
            'aktifitas' => Auth::user()->name.' menghapus data project dengan judul '.$project->name.' project pada '.now()
        ]);

        return redirect()->route('project.index')->with('success', 'Successfully deleted project');

    }
    
}
