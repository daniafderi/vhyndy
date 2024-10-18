@extends('admin.master')

@section('title')
    Tambah Pengeluaran
@endsection

@section('content')
<div class="p-5">
    <div class="bg-white shadow-md rounded p-4">
    <h2 class="text-lg mb-4">Tambah Pengeluaran</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengeluaran.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="tanggal" class="block mb-1">Tanggal</label>
            <input type="date" name="tanggal" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="block mb-1">Nama</label>
            <input type="text" name="nama" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="jumlah" class="block mb-1">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="mt-1 p-2 border border-gray-300 rounded w-full" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block mb-1">Catatan</label>
            <textarea name="deskripsi" class="mt-1 p-2 border border-gray-300 rounded w-full" required></textarea>
        </div>
        <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
</div>
@endsection
