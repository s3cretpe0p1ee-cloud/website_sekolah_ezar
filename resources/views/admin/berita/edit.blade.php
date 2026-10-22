<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Berita - Admin</title>

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

        .current-image {
            margin-bottom: 15px;
        }

        .current-image img {
            width: 220px;
            height: 140px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #ddd;
            display: block;
            margin-top: 8px;
        }

        .no-image {
            color: #777;
            font-size: 14px;
            margin-top: 8px;
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
        <h1>Edit Berita</h1>
        <p>Ubah informasi berita atau pengumuman sekolah</p>
    </div>

    <div class="form-box">

        <form action="{{ url('/admin/berita/' . $berita->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="form-group">

                <label for="judul">
                    Judul Berita
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul', $berita->judul) }}"
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
                >{{ old('isi', $berita->isi) }}</textarea>

                @error('isi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label>
                    Foto Saat Ini
                </label>

                @if($berita->gambar)

                    <div class="current-image">

                        <img
                            src="{{ asset('storage/' . $berita->gambar) }}"
                            alt="Foto berita"
                        >

                    </div>

                @else

                    <div class="no-image">
                        Belum ada foto.
                    </div>

                @endif

            </div>


            <div class="form-group">

                <label for="gambar">
                    Ganti Foto
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                >

                <div class="file-info">
                    Kosongkan jika tidak ingin mengganti foto.
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
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
                    value="{{ old('tanggal', $berita->tanggal) }}"
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
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>