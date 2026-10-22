@extends('layouts.admin')

@section('title', 'Fasilitas')
@section('page-title', 'Fasilitas')

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

    .header h1 {
        color: #123b73;
        margin: 0;
    }

    .subtitle {
        color: #6b7280;
        margin-top: 6px;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 8px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-add {
        background: #f4c400;
        color: #111;
        font-weight: bold;
    }

    .btn-edit {
        background: #e0edff;
        color: #1554a5;
    }

    .btn-delete {
        background: #fee2e2;
        color: #b91c1c;
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
        box-shadow: 0 5px 20px rgba(0,0,0,.06);
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
        font-size: 11px;
        text-align: center;
    }

    .action {
        display: flex;
        gap: 7px;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
    }

    .deskripsi {
        max-width: 400px;
        line-height: 1.5;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div>
            <h1>Fasilitas</h1>

            <div class="subtitle">
                Kelola data fasilitas sekolah
            </div>
        </div>

        <a
            href="{{ url('/admin/fasilitas/create') }}"
            class="btn btn-add"
        >
            + Tambah Fasilitas
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($fasilitass->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Fasilitas</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($fasilitass as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->nama }}"
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
                                    {{ $item->nama }}
                                </strong>

                            </td>


                            <td class="deskripsi">

                                {{ $item->deskripsi ?: '-' }}

                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/fasilitas/' . $item->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/fasilitas/' . $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')"
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

                <h3>Belum ada data fasilitas</h3>

                <p>
                    Silakan tambahkan fasilitas sekolah terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection