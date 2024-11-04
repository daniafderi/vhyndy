@extends('admin.master')

@section('title')
    Laporan
@endsection

@section('content')
<div class="p-5">
    <div class="flex flex-wrap gap-2.5 items-start mb-4">
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 46.937 46.937" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#fff;" d="M35.639,20.94c0,0,3.321-2.927,5.753-6.389c2.748-3.863,5.187-8.821,5.187-8.821 c0.516-1.614,0.607-2.964-0.63-3.852l-1.656-1.19c-1.237-0.891-2.602-0.336-3.852,0.627c0,0-4.085,3.948-6.771,7.684 c-2.686,3.734-4.168,7.529-4.168,7.529c-0.417,1.227-0.542,2.388,0.059,3.259l-0.592,0.839c-1.071-0.826-2.159-1.554-3.206-2.152 c-3.308-1.892-5.93-3.682-5.309-5.5l1.125-3.29c0.369-1.083-1.329-4.975-2.669-6.314C18.464,2.925,18,2.566,17.579,2.288 c-0.792-0.522-2.892-1.202-4.653-1.058c-1.763,0.144-3.437,0.473-3.688,0.675C9.071,2.041,8.962,2.202,8.92,2.382 c-0.077,0.323,0.068,0.69,0.415,1.034l3.03,3.02c1.066,1.072,1.063,2.815-0.005,3.886l-3.246,3.246 c-0.516,0.515-1.205,0.799-1.937,0.799c-0.741,0-1.432-0.285-1.951-0.806l-3.017-3.018c-0.347-0.345-0.713-0.492-1.036-0.416 c-0.179,0.043-0.339,0.152-0.473,0.32c-0.202,0.25-0.532,1.923-0.677,3.685c-0.145,1.763,0.433,3.854,0.874,4.636 c0.442,0.78,2.219,2.381,4.069,3.181c1.448,0.624,2.929,1.035,3.503,0.84c0,0,1.475-0.503,3.293-1.123 c1.819-0.621,3.843,2.156,5.951,5.614c0.958,1.573,2.126,3.157,3.419,4.448l-8.054,11.409c-0.637,0.902-0.422,2.15,0.48,2.787 c0.351,0.247,0.753,0.366,1.151,0.366c0.628,0,1.246-0.295,1.636-0.847l7.885-11.169c0.737,0.561,1.435,1.084,2.071,1.553 c2.175,1.604,3.98,2.932,3.974,3.048c-0.004,0.07-0.008,0.141-0.008,0.212c0,4.202,3.408,7.611,7.61,7.611 c4.203,0,7.613-3.409,7.613-7.611c0-4.204-3.408-7.611-7.61-7.611c-0.072,0-0.142,0.003-0.212,0.009 c-0.117,0.007-1.126-2.277-2.867-4.737c-0.75-1.06-1.696-2.229-2.839-3.425l0.935-1.324C33.796,22.092,34.72,21.634,35.639,20.94z M35.06,36.266c0.752-0.755,1.752-1.168,2.82-1.168c2.197,0,3.986,1.788,3.986,3.987c0,2.2-1.79,3.989-3.986,3.989 c-2.203,0-3.989-1.789-3.989-3.989C33.891,38.02,34.303,37.017,35.06,36.266z"></path> </g> </g></svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Jumlah Service Masuk Bulan ini</span>
            <span>{{ $totalServiceBulanIni }}</span> <!-- Menampilkan total pengeluaran hari ini -->


        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pendapatan Service Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span> <!-- Menampilkan total pengeluaran bulan ini -->

        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPengeluaranBulanIni, 2, ',', '.') }}</span> 

        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span> 

        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Hari ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span>


        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span> 

        </div>


        
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span> 

        </div>
        <div class="bg-white shadow-md rounded p-4 relative pl-[75px] flex-[calc(25%_-_((10px_*_4)_/_3))]">
            <div class="absolute left-3 p-3 bg-sky-600 rounded"><svg class="w-6 h-6 text-gray-800 dark:text-white "
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                </svg>
            </div>
            <span class="block mb-1.5 text-[13px]">Pengeluaran Bulan ini</span>
            <span>{{ 'Rp ' . number_format($totalPendapatanService, 2, ',', '.') }}</span>

        </div>
    </div>


    <a class="py-2 px-4 rounded bg-sky-600 text-white box-border inline-block text-sm" href="window.print()">
        Download Laporan
    </a>




    <div class="bg-white shadow-md rounded p-4 pt-0 mt-4 mb-4">
        <h2 class="block py-3 text-lg font-semibold text-sky-500 text-uppercase border-b border-solid border-slate-200 mb-4">Laporan Service</h2>
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
                    </tr>
                </thead>
                <tbody> 
                    @if ($projects->count() > 0)
                    @foreach ($projects as $project) <tr class="bg-white dark:border-gray-700 odd:bg-slate-100">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap">
                            {{ $project->tanggal_servis }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $project->invoice }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->nama_pelanggan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->judul_servis }}
                        </td>
                        <td class="px-6 py-4">
                            {{ 'Rp. ' . number_format($project->harga_total, 2, ',', '.' )  }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $project->status->name }}
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

    <div class="bg-white shadow-md rounded p-4 pt-0 mt-4">
        <h2 class="block py-3 text-lg font-semibold text-sky-500 text-uppercase border-b border-solid border-slate-200 mb-4">Laporan Pengeluaran</h2>
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
                    </tr>
                </thead>
                <tbody> 
                    @if ($pengeluarans->count() > 0)
                    @foreach ($pengeluarans as $pengeluaran) <tr class="bg-white dark:border-gray-700 odd:bg-slate-100">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap">
                            {{ $pengeluaran->tanggal }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $pengeluaran->nama }}
                        </td>
                        <td class="px-6 py-4 font-semibold">
                            {{ 'Rp. ' . number_format($pengeluaran->jumlah, 2, ',', '.' )  }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $pengeluaran->deskripsi }}
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