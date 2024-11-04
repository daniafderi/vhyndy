@extends('admin.master')

@section('title')
    Project
@endsection

@section('content')
<div class="p-4">
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
    <div class="bg-white shadow-md rounded p-4 pt-0 mt-4 mb-4">
        <div class="flex justify-between items-center p-4 border-b border-solid border-slate-200 mb-4">
            <h2 class="text-lg font-semibold text-sky-500 text-uppercase ">Data Servis</h2>
            <a class="rounded bg-green-500 text-white shadow-md text-[13px] inline-flex items-center gap-1.5 px-2 py-1 font-medium" href="{{ route('project.create') }}"><svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 26 26">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
              </svg>
              Servis Baru</a>
        </div>
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
                        <th scope="col" class="px-6 py-3"> Invoice </th>
                        <th scope="col" class="px-6 py-3"> Customer </th>
                        <th scope="col" class="px-6 py-3"> Judul service </th>
                        <th scope="col" class="px-6 py-3"> Harga </th>
                        <th scope="col" class="px-6 py-3"> Status </th>
                        <th scope="col" class="px-6 py-3"> Action </th>
                    </tr>
                </thead>
                <tbody> 
                    @if ($projects->count() > 0)
                    @foreach ($projects as $project) <tr class="bg-white dark:border-gray-700 odd:bg-slate-100">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap">
                            {{ $project->tanggal_servis }}
                        </th>
                        <td class="px-6 py-4 font-medium">
                            {{ $project->invoice }}
                        </td>
                        <td class="px-6 py-4 text-sky-600 font-medium">
                            {{ $project->nama_pelanggan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->judul_servis }}
                        </td>
                        <td class="px-6 py-4 text-sky-600 font-medium">
                            {{ 'Rp. ' . number_format($project->harga_total, 2, ',', '.' )  }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->status->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1.5">
                                <a class="p-1 rounded bg-sky-500" href="{{ route('project.show', $project->id) }}"><svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  </a>
                                <a class="p-1 rounded bg-yellow-500" href="{{ route('project.edit', $project->id) }}"><svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                  </svg>
                                  </a>
                            </div>
                        </td>
    
                    </tr> @endforeach
    
                    @else
                        <tr class="bg-white dark:border-gray-700 odd:bg-slate-100 "><td colspan="5" class="py-4 text-center">Belum ada data</td></tr>
                    @endif
    
                </tbody>
            </table>
        </div>
        <div>{{ $projects->links() }}</div>
    </div>
</div>
@endsection