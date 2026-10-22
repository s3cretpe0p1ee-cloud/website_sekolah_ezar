<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Berita - Admin</title>

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
            min-height: 180px;
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

        .file-info {
            margin-top: 7px;
            font-size: 13px;
            color: #6b7280;
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
        <h1>Tambah Berita</h1>
        <p>Tambahkan berita atau pengumuman sekolah</p>
    </div>

    <div class="form-box">

        <form action="{{ url('/admin/berita') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label for="judul">
                    Judul Berita
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul berita"
                >

                @error('judul')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="isi">
                    Isi Berita
                </label>

                <textarea
                    id="isi"
                    name="isi"
                    placeholder="Tulis isi berita..."
                >{{ old('isi') }}</textarea>

                @error('isi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="gambar">
                    Foto Berita
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                >

                <div class="file-info">
                    Pilih foto dari komputer. Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </div>

                @error('gambar')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="tanggal">
                    Tanggal
                </label>

                <input
                    type="date"
                    id="tanggal"
                    name="tanggal"
                    value="{{ old('tanggal') }}"
                >

                @error('tanggal')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="buttons">

                <a href="{{ url('/admin') }}" class="btn btn-back">
                    Kembali ke Dashboard
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