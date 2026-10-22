@extends('layouts.admin')

@section('title', 'Tambah Siswa')
@section('page-title', 'Tambah Siswa')

@section('styles')
<style>
    .container {
        max-width: 700px;
        margin: auto;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.06);
    }

    h1 {
        color: #123c69;
        margin-bottom: 8px;
    }

    .subtitle {
        color: #777;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
    }

    input:focus {
        outline: none;
        border-color: #123c69;
    }

    .error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .btn {
        padding: 12px 18px;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-simpan {
        background: #123c69;
        color: white;
    }

    .btn-simpan:hover {
        background: #0e3157;
    }

    .btn-kembali {
        background: #ddd;
        color: #333;
    }

    .btn-kembali:hover {
        background: #ccc;
    }
</style>
@endsection


@section('content')

<div class="container">

    <div class="card">

        <h1>Tambah Siswa</h1>

        <p class="subtitle">
            Masukkan data siswa baru.
        </p>


        <form
            method="POST"
            action="{{ url('/admin/siswa') }}"
        >

            @csrf


            <div class="form-group">

                <label>NIS</label>

                <input
                    type="text"
                    name="nis"
                    value="{{ old('nis') }}"
                    placeholder="Contoh: 2026001"
                >

                @error('nis')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Nama Lengkap</label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Nama lengkap siswa"
                >

                @error('nama')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Kelas</label>

                <input
                    type="text"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    placeholder="Contoh: XII PPLG 1"
                >

                @error('kelas')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Jurusan</label>

                <input
                    type="text"
                    name="jurusan"
                    value="{{ old('jurusan') }}"
                    placeholder="Contoh: PPLG"
                >

                @error('jurusan')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email siswa (opsional)"
                >

                @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-simpan"
                >
                    Simpan Siswa
                </button>


                <a
                    href="{{ url('/admin/siswa') }}"
                    class="btn btn-kembali"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

@endsection