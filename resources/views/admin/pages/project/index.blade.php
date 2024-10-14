@extends('admin.master')

@section('title')
    Project
@endsection

@section('content')
<div class="container">
    <h2 class="title">Project</h2>
    <div class="sparepart">
        @if (session()->has('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @elseif (session()->has('errors'))
                @foreach ($errors->all() as $error)
                    <div class="alert alert-error">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
    <div class="header-btn">
        <a href="{{ route('project.create') }}">Tambah project baru</a>
        <form action="/admin/search/project" method="get">
            <input type="text" name="search">
            <button type="submit">Cari</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th class="sname">Nama project</th>
                <th class="scat">Kategori device</th>
                <th class="sprice">Harga</th>
                <th class="status">Status</th>
                <th class="saction"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <td class="sname"><a href="{{ route('project.edit', $project->id) }}">{{ $project->name }}</a></td>
                <td class="scat">{{ $project->category->name }}</td>
                <td class="sprice">Rp {{ number_format($project->harga_total, 0, ',', '.') }}</td>
                <td class="status">{{ $project->status->name}}</td>
                <td class="saction">
                    <div class="action-button" id="action-{{ $project->id }}">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </div>
                    <div class="modal-action" id="modal-action-{{ $project->id }}">
                        <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{ route('project.edit', $project->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            <span>
                                Edit Project
                            </span>
                        </a>
                        <button type="submit" class="delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            <span>
                                Hapus Project
                            </span>
                        </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection