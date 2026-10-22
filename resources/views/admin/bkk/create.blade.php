<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan BKK - Admin</title>

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
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Tambah Lowongan BKK</h1>
        <p>Lowongan akan tampil di halaman BKK website</p>
    </div>

    <div class="form-box">

        <form
            action="{{ url('/admin/bkk') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">
                <label for="posisi">Posisi</label>

                <input
                    type="text"
                    id="posisi"
                    name="posisi"
                    value="{{ old('posisi') }}"
                    placeholder="Contoh: Junior Web Developer"
                >

                @error('posisi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="perusahaan">Perusahaan</label>

                <input
                    type="text"
                    id="perusahaan"
                    name="perusahaan"
                    value="{{ old('perusahaan') }}"
                    placeholder="Contoh: PT Teknologi Nusantara"
                >

                @error('perusahaan')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>

                    <input
                        type="text"
                        id="lokasi"
                        name="lokasi"
                        value="{{ old('lokasi') }}"
                        placeholder="Contoh: Bogor, Jawa Barat"
                    >

                    @error('lokasi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tipe">Tipe</label>

                    <select
                        id="tipe"
                        name="tipe"
                    >

                        @foreach(['Full-time', 'Kontrak', 'Magang / PKL', 'Part-time'] as $tipe)

                            <option
                                value="{{ $tipe }}"
                                {{ old('tipe') === $tipe ? 'selected' : '' }}
                            >
                                {{ $tipe }}
                            </option>

                        @endforeach

                    </select>

                    @error('tipe')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="gaji">Gaji (opsional)</label>

                    <input
                        type="text"
                        id="gaji"
                        name="gaji"
                        value="{{ old('gaji') }}"
                        placeholder="Contoh: Rp 4,5 - 6 jt"
                    >

                    @error('gaji')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo">Logo / Emoji (opsional)</label>

                    <input
                        type="text"
                        id="logo"
                        name="logo"
                        value="{{ old('logo', '🏢') }}"
                        placeholder="Emoji, contoh: 💻"
                        maxlength="10"
                    >

                    @error('logo')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Deskripsi pekerjaan dan kualifikasi..."
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link">Link Pendaftaran (opsional)</label>

                <input
                    type="url"
                    id="link"
                    name="link"
                    value="{{ old('link') }}"
                    placeholder="https://contoh.com/daftar"
                >

                @error('link')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group checkbox-group">

                <input
                    type="hidden"
                    name="aktif"
                    value="0"
                >

                <input
                    type="checkbox"
                    id="aktif"
                    name="aktif"
                    value="1"
                    {{ old('aktif', true) ? 'checked' : '' }}
                >

                <label for="aktif">
                    Tampilkan di halaman BKK
                </label>

            </div>

            <div class="buttons">

                <a href="{{ url('/admin/bkk') }}" class="btn btn-back">
                    ← Kembali
                </a>

                <button type="submit" class="btn btn-save">
                    Simpan Lowongan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
