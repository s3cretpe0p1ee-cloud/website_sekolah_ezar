<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Galeri - Admin</title>

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

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #123b73;
        }

        input[type="file"] {
            padding: 10px;
            background: #f9fafb;
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
        <h1>Tambah Galeri</h1>
        <p>Tambahkan foto kegiatan sekolah</p>
    </div>

    <div class="form-box">

        {{-- PENTING: enctype untuk upload foto --}}
        <form action="{{ url('/admin/galeri') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="judul">Judul Foto</label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Upacara Bendera"
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
                            <option value="{{ $key }}" {{ old('kategori') === $key ? 'selected' : '' }}>
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
                        value="{{ old('tanggal') }}"
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
                    placeholder="Deskripsi foto..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="gambar">Pilih Foto</label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept="image/jpeg,image/png,image/webp"
                    required
                >

                @error('gambar')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="buttons">

                <a href="{{ url('/admin') }}" class="btn btn-back">
                    Kembali ke Dashboard
                </a>

                <button type="submit" class="btn btn-save">
                    Simpan Foto
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>