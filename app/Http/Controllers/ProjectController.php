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

        $projects = Project::orderBy('id', 'desc')->get();

        return view('admin.pages.project.index', ['projects' => $projects]);
    }

    public function create() {

        $statuses = Status::all();
        $categories = Category::all();
        $spareparts = Sparepart::all();

        return view('admin.pages.project.create', compact(['statuses', 'categories', 'spareparts']));
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            "name" => "required",
            "deskripsi" => "required",
            "image" => "required|image|file",
            "status_id" => "required",
            "category_id" => "required",
            "harga_total" => "required",
            "customer_name" => "required",
            "code_project" => "required",
            "tanggal_service" => "required"
        ]);

        History::create([
            'nama_user' => Auth::user()->name,
            'aktifitas' => Auth::user()->name.' menambahkan data project pada '.now()
        ]);

        $validatedData["image"] = $request->file('image')->store('project-image');
        
        Project::create($validatedData);

        if($request->sparepart) {
            $newProjectId = Project::latest()->first()->id;
        
            $pssp = Project::find($newProjectId);
            $pssp->sparepart()->sync($request->sparepart);

            return redirect()->route('project.index')->with('success', 'Successfully added a new project');
        } else {
            return redirect()->route('project.index')->with('success', 'Successfully added a new project');
        }

        
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

        if($request->file('image')) {
            $validatedData = $request->validate([
                "name" => "required",
                "deskripsi" => "required",
                "status_id" => "required",
                "category_id" => "required",
                "image" => "required|image|file",
                "harga_total" => "required",
                "customer_name" => "required",
                "code_project" => "required"
            ]);
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData["image"] = $request->file('image')->store('project-image');
        } else {
            $validatedData = $request->validate([
                "name" => "required",
                "deskripsi" => "required",
                "status_id" => "required",
                "category_id" => "required",
                "harga_total" => "required",
                "customer_name" => "required",
                "code_project" => "required"
            ]);
        }

        $project->update($validatedData);

        History::create([
            'nama_user' => Auth::user()->name,
            'aktifitas' => Auth::user()->name.' merubah data project dengan judul '.$request->name.' pada '.now()
        ]);

        if($request->sparepart) {
            $project->sparepart()->sync($request->sparepart);

            return redirect()->route('project.index')->with('success', 'Successfully updated project');
        } else {
            return redirect()->route('project.index')->with('success', 'Successfully updated project');
        }
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
