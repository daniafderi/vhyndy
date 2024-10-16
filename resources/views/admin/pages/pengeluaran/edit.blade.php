@extends('admin.master')

@section('title')
    Edit Pengeluaran
@endsection

@section('content')
<div class="p-5">
    <div class="bg-white shadow-md rounded p-4">
        <h2 class="text-xl mb-4">Edit Pengeluaran</h2>
        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" value="{{ $pengeluaran->tanggal }}" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ $pengeluaran->nama }}" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" value="{{ $pengeluaran->jumlah }}" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="mt-1 p-2 border border-gray-300 rounded w-full">{{ $pengeluaran->deskripsi }}</textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-sky-600 text-white py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
