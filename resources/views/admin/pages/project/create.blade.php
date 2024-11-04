@extends('admin.master')

@section('title')
    Tambah Service
@endsection

@section('content')
<div class="p-4">
    <h2>Service Baru</h2>
    <div class="bg-white shadow-md border border-solid border-slate-300 rounded">
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="border-b border-solid border-slate-300 px-5 py-4 font-semibold">
                Invoice : {{ $invoice }}
                <input type="hidden" name="invoice" value="{{ $invoice }}">
            </div>
            <div class="px-5 py-4">
                <div class="flex items-start w-full gap-7 mb-7">
                    <div class="flex-[50%] flex flex-wrap gap-3">
                        <div class="flex flex-[100%] max-w-full items-center">
                            <label class="font-medium inline-block flex-[30%] max-w-[30%] text-sm wajib" for="judul_servis">Judul Servis:</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[50%]" type="text" name="judul_servis" placeholder="contoh: Perbaikan LCD">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center">
                            <label class="font-medium inline-block flex-[30%] max-w-[30%] text-sm" for="tanggal_servis">Tanggal:</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[50%]" type="date" name="tanggal_servis" value="{{ $now }}">
                        </div>
                    </div>
                    <div class="flex-[50%] flex flex-wrap gap-3">
                        <div class="flex flex-[100%] max-w-full items-center">
                            <label class="font-medium inline-block flex-[30%] max-w-[30%] text-sm wajib" for="nama_pelanggan">Nama Customer:</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[50%]" type="text" name="nama_pelanggan" id="nama_pelanggan">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center">
                            <label class="font-medium inline-block flex-[30%] max-w-[30%] text-sm" for="alamat_pelanggan">Alamat:</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[50%]" type="text" name="alamat_pelanggan" id="alamat_pelanggan">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center">
                            <label class="font-medium inline-block flex-[30%] max-w-[30%] text-sm" for="kontak_pelanggan">Nomer HP/WA</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[50%]" type="number" name="kontak_pelanggan" id="kontak_pelanggan">
                        </div>
                    </div>
                </div>
                <div class="flex items-start w-full gap-7">
                    <div class="flex-[50%] flex flex-wrap gap-3">
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="status_id">Status</label>
                            <select class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" name="status_id" id="status_id">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm wajib" for="category_id">Perangkat</label>
                            <select class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" name="category_id" id="category_id">
                                @foreach ($categories as $categori)
                                    <option value="{{ $categori->id }}">{{ $categori->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm wajib" for="merek_perangkat">Merek Perangkat</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="text" name="merek_perangkat" placeholder="contoh: Samsung">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm wajib" for="type_perangkat">Type Perangkat</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="text" name="type_perangkat" placeholder="contoh: S22">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm wajib" for="kelengkapan">Kelengkapan</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="text" name="kelengkapan" placeholder="contoh: Simtray, Softcase, Memorycard">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm wajib" for="kerusakan">Detail Kerusakan</label>
                            <textarea class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="text" name="kerusakan"></textarea>
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="foto_perangkat">Unggah foto perangkat</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="file" name="foto_perangkat" multiple>
                        </div>
                    </div>
                    <div class="flex-[50%] flex flex-wrap gap-3">
                        <fieldset class="flex flex-[100%] max-w-full items-center flex-wrap gap-2 mb-4">
                            
                            <legend class="font-medium inline-block flex-[100%] max-w-full text-sm mb-2.5">Penggunaan Sparepart</legend>
    
                            <div class="flex gap-5 items-center">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded border border-solid border-slate-300 cursor-pointer">
                                    <input id="dalam_toko" class="" type="radio" value="Dalam Toko" name="penggunaan_sparepart" checked>
                                    <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="dalam_toko">Dalam Toko</label>
                                </div>
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded border border-solid border-slate-300 cursor-pointer">
                                    <input id="luar_toko" class="" type="radio" value="Luar Toko" name="penggunaan_sparepart">
                                    <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="luar_toko">Luar Toko</label>
                                </div>
                            </div>
    
                        </fieldset>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="sparepart_digunakan">Sparepart yang diperlukan</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="text" name="sparepart_digunakan" placeholder="contoh: LCD, Baterai, Fleksibel">
                        </div>
                        <div class="px-4 py-3 bg-green-500/25 border border-solid border-green-600 rounded flex-[100%] max-w-full flex gap-2.5 flex-wrap">
                            <div class="flex flex-[100%] max-w-full items-center">
                                <label class="font-medium inline-block flex-[30%] max-w-[40%] text-sm text-green-800 wajib" for="harga_sparepart">Harga Pembelian Sparepart:</label>
                                <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[60%] max-w-[60%] text-green-800" type="number" name="harga_sparepart" id="harga_sparepart" value="0">
                            </div>
                            <div class="flex flex-[100%] max-w-full items-center">
                                <label class="font-medium inline-block flex-[30%] max-w-[40%] text-sm text-green-800" for="harga_jual_sparepart">Harga Jual Sparepart:</label>
                                <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[60%] max-w-[60%] text-green-800" type="number" name="harga_jual_sparepart" id="harga_jual_sparepart" value="0" onkeyup="totalHarga()">
                            </div>
                            <div class="flex flex-[100%] max-w-full items-center">
                                <label class="font-medium inline-block flex-[30%] max-w-[40%] text-sm text-green-800" for="harga_jasa">Harga Jasa</label>
                                <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[60%] max-w-[60%] text-green-800" type="number" name="harga_jasa" id="harga_jasa" value="0" onkeyup="totalHarga()">
                            </div>
                            <div class="flex flex-[100%] max-w-full items-center">
                                <label class="font-medium inline-block flex-[30%] max-w-[40%] text-sm text-green-800" for="harga_total">TOTAL:</label>
                                <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[60%] max-w-[60%] text-green-800" type="number" name="harga_total" id="harga_total" value="0" min="0" readonly>
                            </div>
                            <div class="flex flex-[100%] max-w-full items-center">
                                <label class="font-medium inline-block flex-[30%] max-w-[40%] text-sm text-green-800" for="metode_pembayaran">Pembayaran:</label>
                                <select class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium w-[60%] max-w-[60%] text-green-800" name="metode_pembayaran" id="metode_pembayaran">
                                    <option value="Cash">Cash</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="jumlah_sudah_dibayar">Jumlah sudah dibayar</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="number" value="{{ number_format('0') }}" min="0" name="jumlah_sudah_dibayar" id="jumlah_sudah_dibayar" onkeyup="totalHarga()">
                        </div>
                        <div class="flex flex-[100%] max-w-full items-center flex-wrap gap-2">
                            <label class="font-medium inline-block flex-[100%] max-w-full text-sm" for="jumlah_belum_dibayar">Jumlah belum dibayar</label>
                            <input class="border border-solid border-slate-300 rounded px-3 py-1.5 text-sm font-medium flex-[100%] max-w-full" type="number" value="{{ number_format('0') }}" min="0" name="jumlah_belum_dibayar" id="jumlah_belum_dibayar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 border-t border-solid border-slate-300">
                <a href="{{ route('project.index') }}">Cancel</a>
                <button class="text-white bg-sky-600 px-5 py-2 rounded shadow-sm font-medium text-sm uppercase tracking-wider" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection