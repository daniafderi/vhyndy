@extends('admin.master')

@section('title')
    Pengeluaran
@endsection

@section('content')
<div class="p-5">
    <div class="flex gap-2.5 items-center mb-4">
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Hari ini</span>
            <span>0.00</span>
        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>0.00</span>
        </div>
    </div>


        <a class="py-2 px-4 rounded bg-sky-600 text-white box-border inline-block text-sm" href="{{ route('pengeluaran.create') }}">
        Tambah pengeluaran
    </a>




    <div class="bg-white shadow-md rounded p-4">
        <div class="flex items-center justify-between mb-3">
            <div class="text-sm inline-flex gap-1.5">
                <span>Tampilkan</span>
                <select name="entri" id="entri" class="border-solid border rounded border-slate-200">
                    <option value="1">10</option>
                    <option value="2">25</option>
                    <option value="3">50</option>
                    <option value="4">100</option>
                </select>
                <span>Data</span>
            </div>
            <div class="inline-flex items-center gap-1.5 text-sm">
                <label for="">Cari</label>
                <form action="/search">
                    <input type="text" class="border border-solid border-slate-200 rounded text-[#222]">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs text-gray-700 uppercase  dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3"> Tanggal </th>
                        <th scope="col" class="px-6 py-3"> Nama </th>
                        <th scope="col" class="px-6 py-3"> Jumlah </th>
                        <th scope="col" class="px-6 py-3"> Catatan </th>
                        <th scope="col" class="px-6 py-3"> Action </th>
                    </tr>
                </thead>
                <tbody> @foreach ($datas as $pengeluaran) <tr class="bg-white dark:border-gray-700 odd:bg-slate-100">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap">
                            {{ $pengeluaran->tanggal }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pengeluaran->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pengeluaran->jumlah }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pengeluaran->deskripsi }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST">
                                <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}">Edit</a>
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr> @endforeach </tbody>
            </table>
        </div>
        <div></div>
    </div>
</div>
@endsection