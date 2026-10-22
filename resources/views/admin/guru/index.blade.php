@extends('layouts.admin')

@section('title', 'Guru & Staff')
@section('page-title', 'Guru & Staff')

@section('styles')
<style>
    .container {
        max-width: 1250px;
        margin: auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
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

    .btn:hover {
        opacity: .9;
    }

    .alert {
        background: #d1fae5;
        color: #065f46;
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    /* =========================
       BAGIAN JABATAN
    ========================= */

    .section {
        margin-bottom: 35px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
    }

    .section-title h2 {
        color: #123b73;
        font-size: 21px;
        margin: 0;
    }

    .section-line {
        flex: 1;
        height: 1px;
        background: #dbe3ef;
    }

    /* =========================
       CARD GURU
    ========================= */

    .guru-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .guru-card {
        background: white;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,.06);
        border: 1px solid #edf0f5;
        transition: .2s;
    }

    .guru-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,.09);
    }

    .guru-top {
        display: flex;
        gap: 15px;
        align-items: center;
        margin-bottom: 15px;
    }

    .foto {
        width: 75px;
        height: 90px;
        object-fit: contain;
        background: #f3f4f6;
        border-radius: 9px;
        border: 1px solid #ddd;
        flex-shrink: 0;
    }

    .no-foto {
        width: 75px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f3f4f6;
        color: #9ca3af;
        border-radius: 9px;
        font-size: 11px;
        text-align: center;
        flex-shrink: 0;
    }

    .guru-info {
        min-width: 0;
    }

    .guru-info h3 {
        font-size: 16px;
        color: #1f2937;
        margin-bottom: 6px;
    }

    .nip {
        color: #6b7280;
        font-size: 13px;
    }

    .peran {
        margin-top: 12px;
    }

    .peran-item {
        background: #eef4ff;
        border-radius: 8px;
        padding: 10px 12px;
        margin-bottom: 8px;
    }

    .peran-jenis {
        font-size: 12px;
        font-weight: bold;
        color: #1554a5;
        margin-bottom: 3px;
    }

    .peran-jabatan {
        font-size: 13px;
        color: #374151;
    }

    .peran-kelas {
        font-size: 12px;
        color: #6b7280;
        margin-top: 3px;
    }

    .email {
        font-size: 13px;
        color: #6b7280;
        margin-top: 10px;
        word-break: break-word;
    }

    .action {
        display: flex;
        gap: 7px;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
        background: white;
        border-radius: 12px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 1000px) {
        .guru-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 650px) {
        .header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .guru-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection


@section('content')

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <div>
            <h1>Guru & Staff</h1>

            <div class="subtitle">
                Kelola data guru dan staff sekolah
            </div>
        </div>

        <a
            href="{{ url('/admin/guru/create') }}"
            class="btn btn-add"
        >
            + Tambah Guru
        </a>

    </div>


    <!-- ALERT -->

    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif


    @if($gurus->count())


        {{-- =====================================================
             KEPALA SEKOLAH
        ====================================================== --}}

        @php
            $kelompok = [
                'Kepala Sekolah' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'kepala sekolah';
                    });
                }),

                'Wakasek' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'wakasek';
                    });
                }),

                'Koordinator' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'koordinator';
                    });
                }),

                'Wali Kelas' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'wali kelas';
                    });
                }),

                'Staff' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'staff';
                    });
                }),

                'Guru Mata Pelajaran' => $gurus->filter(function ($guru) {
                    return $guru->peran->contains(function ($peran) {
                        return strtolower($peran->jenis) === 'guru mata pelajaran';
                    });
                }),
            ];
        @endphp


        @foreach($kelompok as $namaKelompok => $dataGuru)

            @if($dataGuru->count())

                <div class="section">

                    <div class="section-title">

                        <h2>
                            {{ $namaKelompok }}
                        </h2>

                        <div class="section-line"></div>

                    </div>


                    <div class="guru-grid">

                        @foreach($dataGuru as $guru)

                            <div class="guru-card">

                                <div class="guru-top">

                                    {{-- FOTO --}}

                                    @if($guru->foto)

                                        <img
                                            src="{{ asset('storage/' . $guru->foto) }}"
                                            alt="{{ $guru->nama }}"
                                            class="foto"
                                        >

                                    @else

                                        <div class="no-foto">
                                            Tidak ada foto
                                        </div>

                                    @endif


                                    {{-- IDENTITAS --}}

                                    <div class="guru-info">

                                        <h3>
                                            {{ $guru->nama }}
                                        </h3>

                                        <div class="nip">
                                            NIP:
                                            {{ $guru->nip ?: '-' }}
                                        </div>

                                    </div>

                                </div>


                                {{-- PERAN --}}

                                <div class="peran">

                                    @forelse($guru->peran as $peran)

                                        <div class="peran-item">

                                            <div class="peran-jenis">
                                                {{ $peran->jenis }}
                                            </div>

                                            <div class="peran-jabatan">
                                                {{ $peran->jabatan }}
                                            </div>

                                            @if($peran->kelas)

                                                <div class="peran-kelas">
                                                    Kelas: {{ $peran->kelas }}
                                                </div>

                                            @endif

                                        </div>

                                    @empty

                                        <div class="peran-item">

                                            <div class="peran-jabatan">
                                                {{ $guru->jabatan ?: '-' }}
                                            </div>

                                        </div>

                                    @endforelse

                                </div>


                                {{-- EMAIL --}}

                                @if($guru->email)

                                    <div class="email">
                                        {{ $guru->email }}
                                    </div>

                                @endif


                                {{-- AKSI --}}

                                <div class="action">

                                    <a
                                        href="{{ url('/admin/guru/' . $guru->id . '/edit') }}"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ url('/admin/guru/' . $guru->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')"
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

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        @endforeach


    @else

        <div class="empty">

            <h3>Belum ada data guru</h3>

            <p>
                Silakan tambahkan data guru atau staff.
            </p>

        </div>

    @endif

</div>

@endsection