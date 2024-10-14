@extends('admin.master')

@section('title')
    Pendapatan
@endsection

@section('content')
<div class="container">
    <h2 class="title">Pendapatan Y</h2>
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
                <form action="{{ ('pendapatan') }}">
                    <label for="start-date">Start date</label>
                    <input type="date" name="start_date" id="start-date" value="{{ $start_date }}">
                    <label for="end-date">End date</label>
                    <input type="date" name="end_date" id="end-date" value="{{ $end_date }}">
                    <button type="submit">Filter</button>
                </form>
            </div>   
    <table>
        <thead>
            <tr>
                <th class="sname">Project Name</th>
                <th class="scat">Category</th>
                <th class="sprice">Price</th>
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
                <td class="status">{{ $project->status->name }}</td>
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
                                Delete Project
                            </span>
                        </button>
                        </form>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div class="total-pendapatan">
    <h3>Total Pendapatan</h3>
    <div class="total-amount">
        <span>Rp</span>
        <span>{{ number_format($totalPendapatan, 0, ',', '.') }}</span>
    </div>
</div>

    </div>
</div>
@endsection
