@extends('layouts.admin')

@section('title', 'PPDB')
@section('page-title', 'PPDB')

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

    .btn-link {
        background: #e8f5e9;
        color: #2e7d32;
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

    .link {
        color: #1554a5;
        word-break: break-all;
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

            <h1>PPDB</h1>

            <div class="subtitle">
                Kelola informasi penerimaan peserta didik baru
            </div>

        </div>


        <a
            href="{{ url('/admin/ppdb/create') }}"
            class="btn btn-add"
        >
            + Tambah PPDB
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($ppdbs->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tahun</th>
                        <th>Link</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($ppdbs as $ppdb)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <strong>
                                    {{ $ppdb->judul }}
                                </strong>

                            </td>


                            <td class="deskripsi">

                                {{ $ppdb->deskripsi ?: '-' }}

                            </td>


                            <td class="tahun">

                                {{ $ppdb->tahun }}

                            </td>


                            <td>

                                @if($ppdb->link)

                                    <a
                                        href="{{ $ppdb->link }}"
                                        target="_blank"
                                        class="btn btn-link"
                                    >
                                        Buka Link
                                    </a>

                                @else

                                    <span>
                                        -
                                    </span>

                                @endif

                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/ppdb/' . $ppdb->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/ppdb/' . $ppdb->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data PPDB ini?')"
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

                <h3>Belum ada data PPDB</h3>

                <p>
                    Silakan tambahkan informasi PPDB terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection