@extends('layouts.admin')

@section('title', 'Prestasi')
@section('page-title', 'Prestasi')

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
        vertical-align: top;
    }

    tr:hover {
        background: #f8fafc;
    }

    .deskripsi {
        max-width: 450px;
        line-height: 1.5;
    }

    .tahun {
        font-weight: bold;
        color: #1554a5;
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
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div>

            <h1>Prestasi</h1>

            <div class="subtitle">
                Kelola data prestasi sekolah
            </div>

        </div>


        <a
            href="{{ url('/admin/prestasi/create') }}"
            class="btn btn-add"
        >
            + Tambah Prestasi
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($prestasis->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Judul Prestasi</th>
                        <th>Deskripsi</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($prestasis as $prestasi)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <strong>
                                    {{ $prestasi->judul }}
                                </strong>

                            </td>


                            <td class="deskripsi">

                                {{ $prestasi->deskripsi ?: '-' }}

                            </td>


                            <td class="tahun">

                                {{ $prestasi->tahun }}

                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/prestasi/' . $prestasi->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/prestasi/' . $prestasi->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')"
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

                <h3>Belum ada data prestasi</h3>

                <p>
                    Silakan tambahkan data prestasi terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection