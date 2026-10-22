@extends('layouts.admin')

@section('title', 'Data Siswa')
@section('page-title', 'Data Siswa')

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
        color: #123c69;
        margin: 0;
    }

    .header p {
        color: #777;
        margin-top: 5px;
    }

    .btn {
        display: inline-block;
        padding: 12px 18px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-tambah {
        background: #123c69;
        color: white;
    }

    .btn-tambah:hover {
        background: #0e3157;
    }

    .btn-edit {
        background: #ffc107;
        color: #222;
    }

    .btn-edit:hover {
        background: #e0aa00;
    }

    .btn-hapus {
        background: #dc3545;
        color: white;
    }

    .btn-hapus:hover {
        background: #bb2d3b;
    }

    .card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #123c69;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 14px;
        border-bottom: 1px solid #eee;
    }

    tr:hover {
        background: #f8fbff;
    }

    .aksi {
        display: flex;
        gap: 8px;
    }

    .success {
        background: #d1e7dd;
        color: #0f5132;
        padding: 14px;
        border-radius: 8px;
        margin-bottom: 20px;
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
            <h1>Data Siswa</h1>

            <p>
                Kelola data siswa SMK INFOKOM Bogor
            </p>
        </div>

        <a
            href="{{ url('/admin/siswa/create') }}"
            class="btn btn-tambah"
        >
            + Tambah Siswa
        </a>

    </div>


    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="card">

        @if($siswas->count() > 0)

            <table>

                <thead>

                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($siswas as $siswa)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $siswa->nis }}
                            </td>

                            <td>
                                {{ $siswa->nama }}
                            </td>

                            <td>
                                {{ $siswa->kelas }}
                            </td>

                            <td>
                                {{ $siswa->jurusan }}
                            </td>

                            <td>
                                {{ $siswa->email ?? '-' }}
                            </td>

                            <td>

                                <div class="aksi">

                                    <a
                                        href="{{ url('/admin/siswa/' . $siswa->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        method="POST"
                                        action="{{ url('/admin/siswa/' . $siswa->id) }}"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-hapus"
                                            onclick="return confirm('Yakin ingin menghapus siswa ini?')"
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
                    Belum ada data siswa
                </h3>

                <p>
                    Silakan tambahkan data siswa terlebih dahulu.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection