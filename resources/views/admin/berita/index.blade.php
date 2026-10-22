@extends('layouts.admin')

@section('title', 'Berita & Pengumuman')
@section('page-title', 'Berita & Pengumuman')

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
        vertical-align: top;
    }

    tr:hover {
        background: #f8fafc;
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

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
    }

    .isi {
        max-width: 350px;
        line-height: 1.5;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="header">

        <div class="header-left">

            <div>
                <h1>Berita & Pengumuman</h1>

                <p>
                    Kelola berita dan pengumuman sekolah
                </p>
            </div>

        </div>


        <a
            href="{{ url('/admin/berita/create') }}"
            class="btn btn-add"
        >
            + Tambah Berita
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="table-box">

        @if($beritas->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($beritas as $berita)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>
                                <strong>
                                    {{ $berita->judul }}
                                </strong>
                            </td>


                            <td class="isi">
                                {{ Str::limit($berita->isi, 120) }}
                            </td>


                            <td>
                                {{ $berita->tanggal }}
                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/berita/' . $berita->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/berita/' . $berita->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
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

                <h3>Belum ada berita</h3>

                <p>
                    Silakan tambahkan berita atau pengumuman terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection