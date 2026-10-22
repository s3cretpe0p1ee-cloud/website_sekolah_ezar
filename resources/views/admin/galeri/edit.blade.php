    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Galeri - Admin</title>

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
            color: #123b73;
        }

        .header p {
            color: #6b7280;
            margin-top: 6px;
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
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        small {
            display: block;
            margin-top: 5px;
            color: #6b7280;
            font-size: 12px;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        input[type="file"] {
            background: #f9fafb;
        }

        .preview {
            margin-top: 10px;
        }

        .preview img {
            width: 220px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
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
        <h1>Edit Galeri</h1>
        <p>Perbarui informasi dan foto galeri</p>
    </div>

    <div class="form-box">

        <form
            action="{{ url('/admin/galeri/' . $galeri->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul Foto</label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul', $galeri->judul) }}"
                >

                @error('judul')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-row">

                <div class="form-group">
                    <label for="kategori">Kategori *</label>

                    <select id="kategori" name="kategori" required>
                        <option value="">— Pilih Kategori —</option>
                        @foreach($kategoriList as $key => $label)
                            <option value="{{ $key }}" {{ old('kategori', $galeri->kategori) === $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    @error('kategori')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Kegiatan</label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', $galeri->tanggal?->format('Y-m-d')) }}"
                    >

                    <small>Ditampilkan sebagai hari, tanggal di halaman galeri.</small>

                    @error('tanggal')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                >{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>Foto Saat Ini</label>

                @if($galeri->gambar)
                    <div class="preview">
                        <img
                            src="{{ asset('storage/' . $galeri->gambar) }}"
                            alt="{{ $galeri->judul }}"
                        >
                    </div>
                @else
                    <p>Tidak ada foto.</p>
                @endif
            </div>


            <div class="form-group">
                <label for="gambar">Ganti Foto</label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                >

                <small>
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

                @error('gambar')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="buttons">

                <a href="{{ url('/admin') }}" class="btn btn-back">
                    ← Kembali
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