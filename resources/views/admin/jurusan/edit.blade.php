<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurusan - Admin</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 28px;
            color: #123b73;
        }

        .header p {
            margin-top: 6px;
            color: #6b7280;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #123b73;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 18px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-back {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-save {
            background: #f4c400;
            color: #111;
            font-weight: bold;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Jurusan</h1>
        <p>Perbarui data program keahlian</p>
    </div>

    <div class="form-box">

        <form action="{{ url('/admin/jurusan/' . $jurusan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kode">Kode Jurusan</label>

                <input
                    type="text"
                    id="kode"
                    name="kode"
                    value="{{ old('kode', $jurusan->kode) }}"
                    placeholder="Contoh: RPL"
                >

                @error('kode')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="nama">Nama Jurusan</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $jurusan->nama) }}"
                    placeholder="Contoh: Rekayasa Perangkat Lunak"
                >

                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Masukkan deskripsi jurusan..."
                >{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="buttons">

                <a href="{{ url('/admin/jurusan') }}" class="btn btn-back">
                    Kembali ke Dashboard
                </a>

                <button type="submit" class="btn btn-save">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>