@extends('layouts.admin')

@section('title', 'Program Unggulan')
@section('page-title', 'Program Unggulan')

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

    .btn-view {
        background: #e8f7ef;
        color: #0b7a3e;
    }

    .alert {
        background: #d1fae5;
        color: #065f46;
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .filter-row {
        display: flex;
        gap: 10px;

        margin-bottom: 18px;

        flex-wrap: wrap;
    }

    .filter-tab {
        background: white;

        border: 1.5px solid #e2e8f0;

        color: #475569;

        padding: 8px 16px;
        border-radius: 20px;

        font-size: 12.5px;
        font-weight: bold;

        cursor: pointer;

        transition: .2s;
    }

    .filter-tab:hover {
        border-color: #1264cf;
        color: #1264cf;
    }

    .filter-tab.is-active {
        background: #1264cf;
        border-color: #1264cf;
        color: white;
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

    tr.is-hidden {
        display: none;
    }

    .icon-box {
        width: 46px;
        height: 46px;

        background: #e9f3ff;
        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 22px;
    }

    .kategori-badge {
        display: inline-block;

        padding: 4px 12px;
        border-radius: 20px;

        font-size: 11px;
        font-weight: bold;

        white-space: nowrap;
    }

    .badge-pkl {
        background: #e0edff;
        color: #1554a5;
    }

    .badge-magang {
        background: #fff3d6;
        color: #92600a;
    }

    .badge-kerjasama {
        background: #f3e8ff;
        color: #7e22ce;
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
        max-width: 300px;
        line-height: 1.5;
        font-size: 13px;
    }
</style>
@endsection


@section('content')

<div class="container">


    <div class="header">

        <div>
            <h1>Program Unggulan</h1>

            <div class="subtitle">
                Kelola program PKL, Magang, dan Kerjasama Perusahaan yang tampil di halaman publik
            </div>
        </div>

        <a href="{{ url('/admin/program-unggulan/create') }}" class="btn btn-add">
            + Tambah Program
        </a>

    </div>


    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    <div class="filter-row">

        <button type="button" class="filter-tab is-active" data-filter="semua">
            Semua ({{ $programs->count() }})
        </button>

        <button type="button" class="filter-tab" data-filter="PKL">
            🏢 PKL
        </button>

        <button type="button" class="filter-tab" data-filter="Magang">
            💼 Magang
        </button>

        <button type="button" class="filter-tab" data-filter="Kerjasama">
            🤝 Kerjasama
        </button>

        <a href="{{ url('/program-unggulan') }}" target="_blank" class="btn btn-view" style="margin-left: auto;">
            Lihat Halaman ↗
        </a>

    </div>


    <div class="table-box">

        @if($programs->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Icon</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Instansi</th>
                        <th>Lokasi</th>
                        <th>Periode</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($programs as $item)

                        <tr data-kategori="{{ $item->kategori }}">

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <div class="icon-box">
                                    {{ $item->icon ?: '⭐' }}
                                </div>

                            </td>


                            <td>
                                <strong>{{ $item->judul }}</strong>
                            </td>


                            <td>

                                <span class="kategori-badge badge-{{ strtolower($item->kategori) }}">
                                    {{ $item->kategori }}
                                </span>

                            </td>


                            <td>
                                {{ $item->instansi }}
                            </td>


                            <td>
                                {{ $item->lokasi ?: '-' }}
                            </td>


                            <td>
                                {{ $item->periode ?: '-' }}
                            </td>


                            <td>
                                {{ $item->urutan }}
                            </td>


                            <td>

                                <span class="status {{ $item->aktif ? 'status-aktif' : 'status-nonaktif' }}">
                                    {{ $item->aktif ? 'Aktif' : 'Nonaktif' }}
                                </span>

                            </td>


                            <td>

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/program-unggulan/' . $item->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/program-unggulan/' . $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus program ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
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

                <h3>Belum ada program</h3>

                <p>
                    Tambahkan program PKL, Magang, atau Kerjasama agar tampil di halaman publik.
                </p>

            </div>

        @endif

    </div>

</div>


<script>
    document.querySelectorAll('.filter-tab').forEach(function (tab) {

        tab.addEventListener('click', function () {

            document.querySelectorAll('.filter-tab').forEach(function (t) {
                t.classList.remove('is-active');
            });

            tab.classList.add('is-active');

            var pilih = tab.getAttribute('data-filter');

            document.querySelectorAll('tbody tr').forEach(function (row) {

                var cocok =
                    pilih === 'semua' ||
                    row.getAttribute('data-kategori') === pilih;

                row.classList.toggle('is-hidden', !cocok);

            });

        });

    });
</script>

@endsection
