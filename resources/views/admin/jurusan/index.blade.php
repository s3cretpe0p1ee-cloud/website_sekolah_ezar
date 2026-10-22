@extends('layouts.admin')

@section('title', 'Jurusan')
@section('page-title', 'Program Keahlian')

@section('styles')
<style>
    .container {
        max-width: 1100px;
        margin: auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .header h1 {
        font-size: 28px;
        color: #123b73;
        margin-bottom: 6px;
    }

    .header p {
        color: #6b7280;
    }

    .btn {
        display: inline-block;
        padding: 12px 18px;
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
    }

    tr:hover {
        background: #f8fafc;
    }

    .action {
        display: flex;
        gap: 8px;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div>
            <h1>Program Keahlian</h1>

            <p>
                Kelola data jurusan sekolah
            </p>
        </div>

        <a
            href="{{ url('/admin/jurusan/create') }}"
            class="btn btn-add"
        >
            + Tambah Jurusan
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($jurusans->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Jurusan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($jurusans as $jurusan)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $jurusan->kode }}
                                </strong>
                            </td>

                            <td>
                                {{ $jurusan->nama }}
                            </td>

                            <td>
                                {{ $jurusan->deskripsi ?? '-' }}
                            </td>

                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/jurusan/' . $jurusan->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/jurusan/' . $jurusan->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')"
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

                <h3>
                    Belum ada data jurusan
                </h3>

                <p>
                    Silakan tambahkan program keahlian terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection