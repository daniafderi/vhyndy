@extends('admin.master')

@section('title')
    Kategori
@endsection

@section('content')
    <div class="container">
        <h2 class="title">Kategori</h2>
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
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="project-form">
                <div class="main-form">
                        <div class="form-input">
                            <label for="category">Tambah kategori baru</label>
                            <div class="category">
                                <input type="text" name="name" id="category" placeholder="Masukkan nama kategori" value="{{ old('name') }}">
                                <div class="form-action">
                                    <button type="submit">Tambah</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>         
        </form>
        <table class="category-table">
            <tr>
                <th class="cnum">No</th>
                <th class="cname">Nama Kategori</th>
                <th class="csum">Jumlah Project</th>
                <th class="cact">Aksi</th>
            </tr>
            @foreach ($categories as $categori)
            <tr>
                <td class="cnum">{{ $loop->iteration }}</td>
                <td class="cname">{{ $categori->name }}</td>
                <td class="csum">{{ $categori->jumlah }}</td>
                <td class="cact">
                    <form action="{{ route('category.destroy', $categori->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="delete-button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
@endsection