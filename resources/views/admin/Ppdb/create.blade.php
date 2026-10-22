<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah PPDB - Admin</title>

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

        textarea {
            min-height: 160px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #123b73;
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
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Tambah PPDB</h1>
        <p>Tambahkan informasi penerimaan peserta didik baru</p>
    </div>

    <div class="form-box">

        <form action="{{ url('/admin/ppdb') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="judul">
                    Judul PPDB
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: PPDB SMK INFOKOM Bogor"
                >

                @error('judul')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="deskripsi">
                    Deskripsi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Tuliskan informasi PPDB..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="tahun">
                    Tahun Ajaran
                </label>

                <input
                    type="text"
                    id="tahun"
                    name="tahun"
                    value="{{ old('tahun') }}"
                    placeholder="Contoh: 2026/2027"
                >

                @error('tahun')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="link">
                    Link Pendaftaran
                </label>

                <input
                    type="url"
                    id="link"
                    name="link"
                    value="{{ old('link') }}"
                    placeholder="https://contoh.com/ppdb"
                >

                @error('link')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="buttons">

                <a href="{{ url('/admin/ppdb') }}" class="btn btn-back">
                    Kembali
                </a>

                <button type="submit" class="btn btn-save">
                    Simpan Data
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>