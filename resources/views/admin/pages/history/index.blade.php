@extends('admin.master')

@section('title')
    Jejak Aktifitas
@endsection

@section('content')
<div class="container">
    <h2 class="title">Jejak Aktifitas</h2>
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
    </div>
    <table class="category-table">
        <tr>
            <th class="cnum">No</th>
            <th class="cname user">Aktifitas</th>
            <th class="crole">Tanggal</th>
        </tr>
        <tr>
            <td class="cnum"></td>
            <td class="cname user"></td>
            <td class="crole"></td>
        </tr>
    </table>
    </div>
</div>
@endsection