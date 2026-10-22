<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Unggulan - Admin</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
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
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
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

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group input {
            width: 18px;
            height: 18px;
        }

        .checkbox-group label {
            margin: 0;
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

        .hint {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Tambah Program Unggulan</h1>
        <p>Program akan tampil di halaman publik /program-unggulan</p>
    </div>

    <div class="form-box">

        <form action="{{ url('/admin/program-unggulan') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="kategori">Kategori *</label>

                <select name="kategori" id="kategori" required>
                    <option value="">— Pilih Kategori —</option>
                    @foreach($kategoriList as $k)
                        <option value="{{ $k }}" {{ old('kategori') === $k ? 'selected' : '' }}>
                            {{ $k }}
                        </option>
                    @endforeach
                </select>

                @error('kategori')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-row">

                <div class="form-group">

                    <label for="judul">Judul Program *</label>

                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        value="{{ old('judul') }}"
                        placeholder="cth: Praktik Kerja Lapangan"
                        required
                    >

                    @error('judul')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="icon">Icon (emoji)</label>

                    <input
                        type="text"
                        name="icon"
                        id="icon"
                        value="{{ old('icon', '⭐') }}"
                        maxlength="10"
                        placeholder="cth: 🏢"
                    >

                    <div class="hint">Kosongkan untuk default ⭐</div>

                    @error('icon')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="form-group">

                <label for="instansi">Instansi / Perusahaan *</label>

                <input
                    type="text"
                    name="instansi"
                    id="instansi"
                    value="{{ old('instansi') }}"
                    placeholder="cth: PT Teknologi Nusantara"
                    required
                >

                @error('instansi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-row">

                <div class="form-group">

                    <label for="lokasi">Lokasi</label>

                    <input
                        type="text"
                        name="lokasi"
                        id="lokasi"
                        value="{{ old('lokasi') }}"
                        placeholder="cth: Bogor, Jawa Barat"
                    >

                    @error('lokasi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="periode">Periode</label>

                    <input
                        type="text"
                        name="periode"
                        id="periode"
                        value="{{ old('periode') }}"
                        placeholder="cth: 3 — 6 Bulan"
                    >

                    @error('periode')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="form-group">

                <label for="deskripsi">Deskripsi</label>

                <textarea
                    name="deskripsi"
                    id="deskripsi"
                    placeholder="Jelaskan program secara singkat...">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-row">

                <div class="form-group">

                    <label for="link">Link Pendaftaran (opsional)</label>

                    <input
                        type="url"
                        name="link"
                        id="link"
                        value="{{ old('link') }}"
                        placeholder="https://..."
                    >

                    @error('link')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="urutan">Urutan Tampil</label>

                    <input
                        type="number"
                        name="urutan"
                        id="urutan"
                        value="{{ old('urutan', 1) }}"
                        min="0"
                    >

                    @error('urutan')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

            </div>


            <div class="form-group">

                <div class="checkbox-group">

                    <input
                        type="checkbox"
                        name="aktif"
                        id="aktif"
                        value="1"
                        {{ old('aktif') === null || old('aktif') ? 'checked' : '' }}
                    >

                    <label for="aktif">Tampilkan di halaman publik</label>

                </div>

            </div>


            <div class="buttons">

                <button type="submit" class="btn btn-save">
                    💾 Simpan Program
                </button>

                <a href="{{ url('/admin/program-unggulan') }}" class="btn btn-back">
                    ← Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
