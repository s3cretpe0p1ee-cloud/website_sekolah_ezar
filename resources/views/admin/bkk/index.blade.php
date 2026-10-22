@extends('layouts.admin')

@section('title', 'BKK')
@section('page-title', 'Lowongan BKK')

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

    .logo {
        width: 46px;
        height: 46px;

        background: #e9f3ff;
        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }

    .status {
        display: inline-block;

        padding: 4px 12px;
        border-radius: 20px;

        font-size: 11px;
        font-weight: bold;
    }

    .status-aktif {
        background: #d1fae5;
        color: #065f46;
    }

    .status-nonaktif {
        background: #fee2e2;
        color: #b91c1c;
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
        max-width: 320px;
        line-height: 1.5;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div>
            <h1>Lowongan BKK</h1>

            <div class="subtitle">
                Kelola lowongan kerja & PKL yang tampil di halaman BKK
            </div>
        </div>

        <a
            href="{{ url('/admin/bkk/create') }}"
            class="btn btn-add"
        >
            + Tambah Lowongan
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($lowongans->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Logo</th>
                        <th>Posisi</th>
                        <th>Perusahaan</th>
                        <th>Lokasi</th>
                        <th>Tipe</th>
                        <th>Gaji</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($lowongans as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <div class="logo">
                                    {{ $item->logo ?: '🏢' }}
                                </div>

                            </td>


                            <td>
                                <strong>
                                    {{ $item->posisi }}
                                </strong>
                            </td>


                            <td>
                                {{ $item->perusahaan }}
                            </td>


                            <td>
                                {{ $item->lokasi }}
                            </td>


                            <td>
                                {{ $item->tipe }}
                            </td>


                            <td>
                                {{ $item->gaji ?: '-' }}
                            </td>


                            <td>

                                <span class="status {{ $item->aktif ? 'status-aktif' : 'status-nonaktif' }}">
                                    {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                                </span>

                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/bkk/' . $item->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/bkk/' . $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')"
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

                <h3>Belum ada lowongan</h3>

                <p>
                    Tambahkan lowongan kerja agar tampil di halaman BKK.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection
