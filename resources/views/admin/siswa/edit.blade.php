<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Siswa - Admin</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
            padding: 40px;
        }

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

        .btn-kembali {
            background: #ddd;
            color: #333;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Siswa</h1>

        <p class="subtitle">
            Perbarui data siswa.
        </p>

        <form method="POST"
              action="{{ url('/admin/siswa/' . $siswa->id) }}">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIS</label>

                <input type="text"
                       name="nis"
                       value="{{ old('nis', $siswa->nis) }}">

                @error('nis')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama', $siswa->nama) }}">

                @error('nama')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kelas</label>

                <input type="text"
                       name="kelas"
                       value="{{ old('kelas', $siswa->kelas) }}">

                @error('kelas')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Jurusan</label>

                <input type="text"
                       name="jurusan"
                       value="{{ old('jurusan', $siswa->jurusan) }}">

                @error('jurusan')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $siswa->email) }}">

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="buttons">

                <button type="submit" class="btn btn-simpan">
                    Simpan Perubahan
                </button>

                <a href="{{ url('/admin/siswa') }}"
                   class="btn btn-kembali">
                    Kembali ke Dashboard
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>