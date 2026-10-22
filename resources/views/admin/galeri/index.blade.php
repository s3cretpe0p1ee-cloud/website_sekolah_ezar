@extends('layouts.admin')

@section('title', 'Galeri')
@section('page-title', 'Galeri')

@section('styles')
<style>
    .container {
        max-width: 1200px;
        margin: auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header h1 {
        font-size: 28px;
        color: #123b73;
    }

    .header p {
        margin-top: 6px;
        color: #6b7280;
    }

    .btn {
        display: inline-block;
        padding: 11px 17px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-add {
        background: #f4c400;
        color: #111;
        font-weight: bold;
    }

    .btn-add:hover {
        background: #e0b500;
    }

    .alert {
        background: #d1fae5;
        color: #065f46;
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .table-box {
        background: white;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #123b73;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    tr:hover {
        background: #f8fafc;
    }

    .foto {
        width: 100px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .no-foto {
        width: 100px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f4f6;
        color: #9ca3af;
        border-radius: 8px;
        font-size: 12px;
        text-align: center;
    }

    .action {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        background: #e0edff;
        color: #1554a5;
    }

    .btn-edit:hover {
        background: #cbdffb;
    }

    .btn-delete {
        background: #fee2e2;
        color: #b91c1c;
    }

    .btn-delete:hover {
        background: #fecaca;
    }

    .kategori-badge {
        display: inline-block;

        padding: 4px 12px;
        border-radius: 20px;

        font-size: 11px;
        font-weight: bold;

        white-space: nowrap;
    }

    .badge-upacara {
        background: #e0edff;
        color: #1554a5;
    }

    .badge-industri {
        background: #e8f7ef;
        color: #0b7a3e;
    }

    .badge-kegiatan {
        background: #fff3d6;
        color: #92600a;
    }

    .badge-prestasi {
        background: #fce7f3;
        color: #be185d;
    }

    .badge-seminar {
        background: #f3e8ff;
        color: #7e22ce;
    }

    .tgl {
        font-size: 12.5px;
        color: #475569;
        white-space: nowrap;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div class="header-left">

            <div>

                <h1>Galeri</h1>

                <p>
                    Kelola foto kegiatan dan dokumentasi sekolah
                </p>

            </div>

        </div>


        <a
            href="{{ url('/admin/galeri/create') }}"
            class="btn btn-add"
        >
            + Tambah Galeri
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($galeris->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($galeris as $galeri)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($galeri->gambar)

                                    <img
                                        src="{{ $galeri->url_foto }}"
                                        alt="{{ $galeri->judul }}"
                                        class="foto"
                                    >

                                @else

                                    <div class="no-foto">
                                        Tidak ada foto
                                    </div>

                                @endif

                            </td>


                            <td>

                                <strong>
                                    {{ $galeri->judul }}
                                </strong>

                            </td>


                            <td>

                                <span class="kategori-badge badge-{{ $galeri->kategori }}">
                                    {{ $galeri->label_kategori }}
                                </span>

                            </td>


                            <td>
                                <span class="tgl">{{ $galeri->tanggal_indo ?: '-' }}</span>
                            </td>


                            <td>
                                {{ \Illuminate\Support\Str::limit($galeri->deskripsi, 60) ?: '-' }}
                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/galeri/' . $galeri->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/galeri/' . $galeri->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus galeri ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <h3>Belum ada galeri</h3>

                <p>
                    Silakan tambahkan foto kegiatan sekolah terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection